<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Session; 
class AuthorizeController extends Controller
{
	public function index()
	{
		$arreglo2 =Session::get('carrito');
		$total=0;
		foreach ($arreglo2 as $key => $value) {
			$total=$arreglo2[$key]['attr12']+$total;
		}
		return view('checkout.authorize',['total'=>$total]); 
	}
	public function chargeCreditCard(Request $request)
	{
        // Common setup for API credentials
		$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
		
		//sandbox
		//$merchantAuthentication->setName('2E3z6KruR');
		//$merchantAuthentication->setTransactionKey('48Cy6rk4H82xD6b9');
        //production
		$merchantAuthentication->setName('63ubT5Hpcc2J');
		$merchantAuthentication->setTransactionKey('554Y7vat82GEu93e');

		$refId = 'PTL-'.time();
        // Create the payment data for a credit card
		$creditCard = new AnetAPI\CreditCardType();
		$creditCard->setCardNumber($request->cnumber);
          // $creditCard->setExpirationDate( "2038-12");
		$expiry = $request->card_expiry_year . '-' . $request->card_expiry_month;
		$creditCard->setExpirationDate($expiry);
		$creditCard->setCardCode($request->ccode);
		$paymentOne = new AnetAPI\PaymentType();
		$paymentOne->setCreditCard($creditCard);

		$order = new AnetAPI\OrderType();
		$order->setDescription("New Item");

        // Set the customer's Bill To address
		$customerAddress = new AnetAPI\CustomerAddressType();
		$customerAddress->setFirstName($request->Name);
		$customerAddress->setAddress($request->CAddress);
		$customerAddress->setCity($request->Ccity);
		$customerAddress->setState($request->CinputState);
		$customerAddress->setZip($request->Czipcode);
		$customerAddress->setCountry("USA");

        // Create a transaction
		$transactionRequestType = new AnetAPI\TransactionRequestType();
		$transactionRequestType->setTransactionType("authOnlyTransaction");
		$transactionRequestType->setAmount($request->camount);
		$transactionRequestType->setPayment($paymentOne);
		$transactionRequestType->setBillTo($customerAddress);
		$request = new AnetAPI\CreateTransactionRequest();
		$request->setMerchantAuthentication($merchantAuthentication);
		$request->setRefId( $refId);
		$request->setTransactionRequest($transactionRequestType);
		$controller = new AnetController\CreateTransactionController($request);
		$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
		if ($response != null) {
			if ($response->getMessages()->getResultCode() == "Ok") {
				$tresponse = $response->getTransactionResponse();

				if ($tresponse != null && $tresponse->getMessages() != null) {
					$array = array(
						"ReferenceCode" => $response->getrefId(),
						"ResultCode" => $response->getMessages()->getResultCode(),
						"getResponseCode" => $tresponse->getResponseCode(),
						"getAuthCode" => $tresponse->getAuthCode(),
						"getTransId" => $tresponse->getTransId(),
						"getCode" => $tresponse->getMessages()[0]->getCode(),
						"getDescription" => $tresponse->getMessages()[0]->getDescription(),
					);
					return response()->json(['success'=>$array]);

				} else {
					if ($tresponse->getErrors() != null) {
						$array = array(
							"ResultCode" => $response->getMessages()->getResultCode(),
							"Result" => 'Transaction Failed',
							"Errorcode" => $tresponse->getErrors()[0]->getErrorCode(),
							"Errormessage" => $tresponse->getErrors()[0]->getErrorText(),
						);
						return response()->json(['success'=>$array]);
					}
				}
			} else {
				$tresponse = $response->getTransactionResponse();
				if ($tresponse != null && $tresponse->getErrors() != null) {
					$array = array(
						"ResultCode" => $response->getMessages()->getResultCode(),
						"Result" => 'Transaction Failed',
						"Errorcode" => $tresponse->getErrors()[0]->getErrorCode(),
						"Errormessage" => $tresponse->getErrors()[0]->getErrorText(),
					);
					return response()->json(['success'=>$array]);
				} else {
					$array = array(
						"ResultCode" => $response->getMessages()->getResultCode(),
						"Result" => 'Transaction Failed',
						"Errorcode" => $tresponse->getErrors()[0]->getErrorCode(),
						"Errormessage" => $tresponse->getErrors()[0]->getErrorText(),
					);
					return response()->json(['success'=>$array]);
				}
			}
		} else {
			return response()->json(['success'=>'No response returned']);
		}
        //return redirect('/');
	}

	function capturePreviouslyAuthorizedAmount(Request $request){
    /* Create a merchantAuthenticationType object with authentication details
    retrieved from the constants file */

    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    //$merchantAuthentication->setName('2E3z6KruR');
	//$merchantAuthentication->setTransactionKey('48Cy6rk4H82xD6b9');

	$merchantAuthentication->setName('63ubT5Hpcc2J');
    $merchantAuthentication->setTransactionKey('554Y7vat82GEu93e');
    //Set the transaction's refId
    $refId = 'ref' . time();
    //Now capture the previously authorized  amount
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("priorAuthCaptureTransaction");
    $transactionRequestType->setRefTransId($request->ID);

    
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setTransactionRequest( $transactionRequestType);

    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
    if ($response != null) {
    	if ($response->getMessages()->getResultCode() == "Ok") {
    		$tresponse = $response->getTransactionResponse();

    		if ($tresponse != null && $tresponse->getMessages() != null) {
    			$array = array(
    				"ResultCode" => $response->getMessages()->getResultCode(),
    				"getResponseCode" => $tresponse->getResponseCode(),
    				"getAuthCode" => $tresponse->getAuthCode(),
    				"getTransId" => $tresponse->getTransId(),
    				"getCode" => $tresponse->getMessages()[0]->getCode(),
    				"getDescription" => $tresponse->getMessages()[0]->getDescription(),
    			);
    			return response()->json(['success'=>$array]);

    		} else {
    			if ($tresponse->getErrors() != null) {
    				$array = array(
    					"ResultCode" => $response->getMessages()->getResultCode(),
    					"Result" => 'Transaction Failed',
    					"Errorcode" => $tresponse->getErrors()[0]->getErrorCode(),
    					"Errormessage" => $tresponse->getErrors()[0]->getErrorText(),
    				);
    				return response()->json(['success'=>$array]);
    			}
    		}
    	} else {
    		$tresponse = $response->getTransactionResponse();
    		if ($tresponse != null && $tresponse->getErrors() != null) {
    			$array = array(
    				"ResultCode" => $response->getMessages()->getResultCode(),
    				"Result" => 'Transaction Failed',
    				"Errorcode" => $tresponse->getErrors()[0]->getErrorCode(),
    				"Errormessage" => $tresponse->getErrors()[0]->getErrorText(),
    			);
    			return response()->json(['success'=>$array]);
    		} else {
    			$array = array(
    				"ResultCode" => $response->getMessages()->getResultCode(),
    				"Result" => 'Transaction Failed',
    				"Errorcode" => $tresponse->getErrors()[0]->getErrorCode(),
    				"Errormessage" => $tresponse->getErrors()[0]->getErrorText(),
    			);
    			return response()->json(['success'=>$array]);
    		}
    	}
    } else {
    	return response()->json(['success'=>'No response returned']);
    }


}





}
