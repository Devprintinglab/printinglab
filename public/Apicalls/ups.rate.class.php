<?php

/**
 * @author Jonathan W. Kelly <jonathanwkelly@gmail.com>
 **/
class UpsShippingQuote {
	/**
	 * Get this license number from your UPS account
	 **/
	var $strAccessLicenseNumber = '2D4AC1958555722C';
	/**
	 * The username you use to login to ups.com
	 **/
	var $strUserId = 'printinglab';
	/**
	 * The password you use to login to ups.com
	 **/
	var $strPassword = 'Power6691.';
	/**
	 * Your UPS account number (may have to remove dashes)
	 **/
	var $strShipperNumber = 'A889R5';
	/**
	07074
	27616
	33169
	45424
	60148
	76011
	77080
	84119
	85040
	90039 
	95035
	98354
	 * This is the "ship from" zip
	 **/
	// var $strShipperZip = '07093';
	/**
	 * The default method you'd like to use
	 **/
	var $strDefaultServiceCode = '03'; // GND / General Ground method
	/** 
	 * The location of the web service
	 **/
	var $strRateWebServiceLocation = 'https://onlinetools.ups.com/ups.app/xml/Rate'; // Production URL
	/**
	 * Set this to true to print out debugging information
	 **/
	var $boolDebugMode = false;

	/**
	 * Constructor method for PHP 4
	 **/


	private function GetServiceCode($strService='GND') {

		switch(strtoupper($strService)) { 
			case '1DM':            
				$strServiceCode = '14'; 
				break; 

			case '1DA':            
				$strServiceCode = '01'; 
				break;          

			case '1DAPI':            
				$strServiceCode = '01'; 
				break; 

			case '1DP':            
				$strServiceCode = '13'; 
				break; 

			case '2DM':            
				$strServiceCode = '59'; 
				break; 

			case '2DA':            
				$strServiceCode = '02'; 
				break; 

			case '3DS':            
				$strServiceCode = '12'; 
				break; 

			case 'GND':            
				$strServiceCode = '03'; 
				break; 

			case 'GNDRES':            
				$strServiceCode = '03'; 
				break; 

			case 'GNDCOM':            
				$strServiceCode = '03'; 
				break;           

			case 'STD':            
				$strServiceCode = '11'; 
				break; 

			case 'XPR':            
				$strServiceCode = '07'; 
				break; 

			case 'XDM':            
				$strServiceCode = '54'; 
				break; 

			case 'XPD':            
				$strServiceCode = '08'; 
				break; 

			default:            
				$strServiceCode = '03'; 
				break; 

		}

		return $strServiceCode;

	} # end method GetServiceCode()


	public function GetShippingRate($strFromZip,$strDestinationZip, $strServiceShortName='GND', $strPackageLength=18, $strPackageWidth=12, $strPackageHeight=4, $strPackageWeight=30, $boolReturnPriceOnly=false) {
		$strServiceCode = $this->GetServiceCode($strServiceShortName);
		$strXml ="<?xml version=\"1.0\"?>  
		<AccessRequest xml:lang=\"en-US\">  
			<AccessLicenseNumber>{$this->strAccessLicenseNumber}</AccessLicenseNumber>  
			<UserId>{$this->strUserId}</UserId>  
			<Password>{$this->strPassword}</Password>  
		</AccessRequest>  
		<?xml version=\"1.0\"?>  
		<RatingServiceSelectionRequest xml:lang=\"en-US\">  
			<Request>  
				<TransactionReference>  
					<CustomerContext>Rating and Service</CustomerContext>  
					<XpciVersion>1.0</XpciVersion>  
				</TransactionReference>  
				<RequestAction>Rate</RequestAction>  
				<RequestOption>Rate</RequestOption>  
			</Request>  
			<PickupType>  
				<Code>03</Code> 
				<Description>Rate</Description> 
			</PickupType>  
			<Shipment>  
				<Shipper>  
					<Address>  
						<PostalCode>{$strFromZip}</PostalCode>  
						<CountryCode>US</CountryCode>  
					</Address>  
					<ShipperNumber>{$this->strShipperNumber}</ShipperNumber>  
				</Shipper>  
				<ShipTo>  
					<Address>  
						<PostalCode>{$strDestinationZip}</PostalCode>  
						<CountryCode>US</CountryCode>   
					</Address>  
				</ShipTo>  
				<ShipFrom>  
					<Address>  
						<PostalCode>{$strFromZip}</PostalCode>  
						<CountryCode>US</CountryCode>  
					</Address>  
				</ShipFrom>  
				<Service>  
					<Code>{$strServiceCode}</Code>
					<Description>GBN</Description>   
				</Service>  
				<Package>  
					<PackagingType>  
						<Code>00</Code>  
					</PackagingType>    
					<PackageWeight>  
						<UnitOfMeasurement>  
							<Code>LBS</Code>  
						</UnitOfMeasurement>  
						<Weight>{$strPackageWeight}</Weight>  
					</PackageWeight>  
				</Package>  
			</Shipment>  
		</RatingServiceSelectionRequest>"; 

		$rsrcCurl = curl_init($this->strRateWebServiceLocation);  

		curl_setopt($rsrcCurl, CURLOPT_HEADER, 0);
		curl_setopt($rsrcCurl, CURLOPT_POST, 1);
		curl_setopt($rsrcCurl, CURLOPT_TIMEOUT, 60);
		curl_setopt($rsrcCurl, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($rsrcCurl, CURLOPT_SSL_VERIFYPEER, 0);  
		curl_setopt($rsrcCurl, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($rsrcCurl, CURLOPT_POSTFIELDS, $strXml);  

		$strResult = curl_exec($rsrcCurl);
		if($this->boolDebugMode) echo "<!--{$strResult}-->";		

		$objResult = new SimpleXMLElement($strResult);
		if($this->boolDebugMode) print_r($objResult);

		curl_close($rsrcCurl);

		// Return either the decimal string value that is the rate
		if($boolReturnPriceOnly) {

			return json_encode($objResult);

		// Or return the full object and do with it what you want
		} else {

			return json_encode($objResult);

		}

	} # end method GetShippingRate()

} # end class UpsShippingQuote

?>
