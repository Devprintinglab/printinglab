<?php

    // Be sure your webserver is configured to never display the contents of this file under any circumstances.
    // The secret_key value below should be protected and never shared with anyone.

    $amazonpay_config = array(
        'merchant_id'   => 'AVY986CSE8M7K', // Merchant/SellerID
        'access_key'    => 'AKIAJVS4QYXPX7TIORJA', // MWS Access Key
        'secret_key'    => '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', // MWS Secret Key
        'client_id'     => 'amzn1.application-oa2-client.b62830e753584c9092d89054582a5aad', // Login With Amazon Client ID
        'region'        => 'us',  // us, de, uk, jp
        'currency_code' => 'USD', // USD, EUR, GBP, JPY
        'sandbox'       => true); // Use sandbox test mode

function getWidgetsJsURL($config)
{
    if ($config['sandbox'])
        $sandbox = "sandbox/";
    else
        $sandbox = "";

    switch (strtolower($config['region'])) {
        case "us":
            return "https://static-na.payments-amazon.com/OffAmazonPayments/us/" . $sandbox . "js/Widgets.js";
            break;
        case "uk":
            return "https://static-eu.payments-amazon.com/OffAmazonPayments/uk/" . $sandbox . "lpa/js/Widgets.js";
            break;
        case "jp":
            return "https://static-fe.payments-amazon.com/OffAmazonPayments/jp/" . $sandbox . "lpa/js/Widgets.js";
            break;
        default:
            return "https://static-eu.payments-amazon.com/OffAmazonPayments/de/" . $sandbox . "lpa/js/Widgets.js";
            break;
    }
}

?>
