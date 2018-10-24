<?php

  //Configuration
  $access = "2D4AC1958555722C";
  $userid = "printinglab";
  $passwd = "Power6691.";
  $wsdl = "RateWS.wsdl";
  $operation = "ProcessRate";
  $endpointurl = 'https://wwwcie.ups.com/webservices/Rate';
  $outputFileName = "XOLTResult.xml";

  function processRate()
  {
      //create soap request
      $option['RequestOption'] = 'Shop';
      $request['Request'] = $option;

      $pickuptype['Code'] = '01';
      $pickuptype['Description'] = 'Daily Pickup';
      $request['PickupType'] = $pickuptype;

      $customerclassification['Code'] = '01';
      $customerclassification['Description'] = 'Classfication';
      $request['CustomerClassification'] = $customerclassification;

      $shipper['Name'] = 'Imani Carr';
      $shipper['ShipperNumber'] = '222006';
      $address['AddressLine'] = array
      (
          'Southam Rd',
          '4 Case Cour',
          'Apt 3B'
      );
      $address['City'] = 'Timonium';
      $address['StateProvinceCode'] = 'MD';
      $address['PostalCode'] = '21093';
      $address['CountryCode'] = 'US';
      $shipper['Address'] = $address;
      $shipment['Shipper'] = $shipper;

      $shipto['Name'] = 'Imani Imaginarium';
      $addressTo['AddressLine'] = '21 ARGONAUT SUITE B';
      $addressTo['City'] = 'ALISO VIEJO';
      $addressTo['StateProvinceCode'] = 'CA';
      $addressTo['PostalCode'] = '92656';
      $addressTo['CountryCode'] = 'US';
      $addressTo['ResidentialAddressIndicator'] = '';
      $shipto['Address'] = $addressTo;
      $shipment['ShipTo'] = $shipto;

      $shipfrom['Name'] = 'Imani Imaginarium';
      $addressFrom['AddressLine'] = array
      (
          'Southam Rd',
          '4 Case Court',
          'Apt 3B'
      );
      $addressFrom['City'] = 'Timonium';
      $addressFrom['StateProvinceCode'] = 'MD';
      $addressFrom['PostalCode'] = '21093';
      $addressFrom['CountryCode'] = 'US';
      $shipfrom['Address'] = $addressFrom;
      $shipment['ShipFrom'] = $shipfrom;

      $service['Code'] = '03';
      $service['Description'] = 'Service Code';
      $shipment['Service'] = $service;

      $packaging1['Code'] = '02';
      $packaging1['Description'] = 'Rate';
      $package1['PackagingType'] = $packaging1;
      $dunit1['Code'] = 'IN';
      $dunit1['Description'] = 'inches';
      $dimensions1['Length'] = '5';
      $dimensions1['Width'] = '4';
      $dimensions1['Height'] = '10';
      $dimensions1['UnitOfMeasurement'] = $dunit1;
      $package1['Dimensions'] = $dimensions1;
      $punit1['Code'] = 'LBS';
      $punit1['Description'] = 'Pounds';
      $packageweight1['Weight'] = '1';
      $packageweight1['UnitOfMeasurement'] = $punit1;
      $package1['PackageWeight'] = $packageweight1;

      $packaging2['Code'] = '02';
      $packaging2['Description'] = 'Rate';
      $package2['PackagingType'] = $packaging2;
      $dunit2['Code'] = 'IN';
      $dunit2['Description'] = 'inches';
      $dimensions2['Length'] = '3';
      $dimensions2['Width'] = '5';
      $dimensions2['Height'] = '8';
      $dimensions2['UnitOfMeasurement'] = $dunit2;
      $package2['Dimensions'] = $dimensions2;
      $punit2['Code'] = 'LBS';
      $punit2['Description'] = 'Pounds';
      $packageweight2['Weight'] = '2';
      $packageweight2['UnitOfMeasurement'] = $punit2;
      $package2['PackageWeight'] = $packageweight2;

      $shipment['Package'] = array(	$package1 , $package2 );
      $shipment['ShipmentServiceOptions'] = '';
      $shipment['LargePackageIndicator'] = '';
      $request['Shipment'] = $shipment;
      echo "Request.......\n";
      print_r($request);
      echo "\n\n";
      return $request;
  }

  try
  {

    $mode = array
    (
         'soap_version' => 'SOAP_1_1',  // use soap 1.1 client
         'trace' => 1
    );

    // initialize soap client
  	$client = new SoapClient($wsdl , $mode);

  	//set endpoint url
  	$client->__setLocation($endpointurl);


    //create soap header
    $usernameToken['Username'] = $userid;
    $usernameToken['Password'] = $passwd;
    $serviceAccessLicense['AccessLicenseNumber'] = $access;
    $upss['UsernameToken'] = $usernameToken;
    $upss['ServiceAccessToken'] = $serviceAccessLicense;

    $header = new SoapHeader('http://www.ups.com/XMLSchema/XOLTWS/UPSS/v1.0','UPSSecurity',$upss);
    $client->__setSoapHeaders($header);


    //get response
  	$resp = $client->__soapCall($operation ,array(processRate()));

    //get status
    echo "Response Status: " . $resp->Response->ResponseStatus->Description ."\n";

    //save soap request and response to file
    $fw = fopen($outputFileName , 'w');
    fwrite($fw , "Request: \n" . $client->__getLastRequest() . "\n");
    fwrite($fw , "Response: \n" . $client->__getLastResponse() . "\n");
    fclose($fw);

  }
  catch(Exception $ex)
  {
  	print_r ($ex);
  }



Module_Name_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getUpsRates($parcel, $destination)
    {    
        $xmlRequest = "";

        $shipToPostalCode  = $destination['postal_code'];
        $shipToCountryCode = $destination['dest_country_id'];
        $shipToRegionCode  = '';

        $weight = $parcel['weight'];
        $length = $parcel['length'];
        $height = $parcel['height'];
        $width  = $parcel['width'];

        $url = Mage::getStoreConfig('carriers/ups/gateway_xml_url');

        if (!$url) {
            $url = 'https://onlinetools.ups.com/ups.app/xml/Rate';
        }

        $userid         = Mage::getStoreConfig('carriers/ups/username');
        $userid_pass    = Mage::getStoreConfig('carriers/ups/password');
        $access_key     = Mage::getStoreConfig('carriers/ups/access_license_number');
        $shipper        = Mage::getStoreConfig('carriers/ups/shipper_number');

        $shipperCity          = Mage::getStoreConfig('shipping/origin/city');
        $shipperPostalCode    = Mage::getStoreConfig('shipping/origin/postcode');
        $shipperCountryCode   = Mage::getStoreConfig('shipping/origin/country_id');
        $shipperStateProvince = Mage::getStoreConfig('shipping/origin/region_id');

        $shipperStateProvince = Mage::getStoreConfig(Mage_Shipping_Model_Shipping::XML_PATH_STORE_REGION_ID, Mage::app()->getStore()->getStoreId());

        if (is_numeric($shipperStateProvince)) {
            $shipperStateProvince = Mage::getModel('directory/region')->load($shipperStateProvince)->getCode();
        }

        $xmlRequest =  <<<XMLRequest
      <?xml version="1.0"?>
        <AccessRequest xml:lang="en-US">
        <AccessLicenseNumber>$access_key</AccessLicenseNumber>
        <UserId>$userid</UserId>
        <Password>$userid_pass</Password>
      </AccessRequest>
      <?xml version="1.0"?>
        <RatingServiceSelectionRequest xml:lang="en-US">
          <Request>
            <TransactionReference>
              <CustomerContext>Rating and Service</CustomerContext>
              <XpciVersion>1.0</XpciVersion>
            </TransactionReference>
            <RequestAction>Rate</RequestAction>
            <RequestOption>Shop</RequestOption>
          </Request>
          <PickupType>
            <Code>03</Code>
            <Description>Customer Counter</Description>
          </PickupType>
          <Shipment>
            <Shipper>
              <ShipperNumber>{$shipper}</ShipperNumber>
              <Address>
                <City>{$shipperCity}</City>
                <PostalCode>{$shipperPostalCode}</PostalCode>
                <CountryCode>{$shipperCountryCode}</CountryCode>
                <StateProvinceCode>{$shipperStateProvince}</StateProvinceCode>
              </Address>
            </Shipper>
            <ShipTo>
              <Address>
                <PostalCode>{$shipToPostalCode}</PostalCode>
                <CountryCode>{$shipToCountryCode}</CountryCode>
                <ResidentialAddress>01</ResidentialAddress>
                <StateProvinceCode>{$shipToRegionCode}</StateProvinceCode>
                <ResidentialAddressIndicator>01</ResidentialAddressIndicator>
              </Address>
            </ShipTo>
            <ShipFrom>
              <Address>
                <PostalCode>{$shipperPostalCode}</PostalCode>
                <CountryCode>{$shipperCountryCode}</CountryCode>
                <StateProvinceCode>{$shipperStateProvince}</StateProvinceCode>
              </Address>
            </ShipFrom>
            <TaxInformationIndicator/>
            <Package>
              <PackagingType><Code>00</Code></PackagingType>
              <Dimensions>  
                <UnitOfMeasurement>  
                  <Code>IN</Code>  
                </UnitOfMeasurement>  
                <Length>{$length}</Length>  
                <Width>{$width}</Width>  
                <Height>{$height}</Height>  
              </Dimensions> 
              <PackageWeight>
                <UnitOfMeasurement><Code>LBS</Code></UnitOfMeasurement>
                <Weight>{$weight}</Weight>
              </PackageWeight>
            </Package>
            <RateInformation>
              <NegotiatedRatesIndicator/>
            </RateInformation>
          </Shipment>
        </RatingServiceSelectionRequest>
XMLRequest;

    $debugData = '';

    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequest);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, Mage::getStoreConfig('carriers/ups/verify_peer'));
        $xmlResponse = curl_exec ($ch);
    }
    catch (Exception $e) {
        $xmlResponse = '';
    }

    return $this->_formatUpsRates($xmlResponse);
  }










?>
