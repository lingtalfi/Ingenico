<?php


namespace Ling\Ingenico\FlexCheckout;


interface FlexCheckoutInterface
{

    /*
     * How to:
     * ========
     *
     * Create an iframe in your code, like so:
     *
     *
     *          <iframe id="payment" name="payment" style="width: 500px; height: 500px"></iframe>
     *
     *
     *
     * Then call the injectFlexFormToIframe method, like so:
     *
     *


$h = IngenicoHandler::createByConfFile(__DIR__ . "/ingenico.conf.php"); // change the path accordingly; depends on your system


$res = $h->flexCheckout()->injectFlexFormToIframe("payment", [
    'CARD.BRAND' => "VISA",
    'CARD.PAYMENTMETHOD' => "CreditCard",
    'ALIAS.ORDERID' => "checkoutogone-" . date('Y-m-d H:i:s'),
    // 'ALIAS.ALIASID' => "myapp-alias1111", // uncomment this to use your own app aliases
    'ALIAS.STOREPERMANENTLY' => "Y",
    'PARAMETERS.ACCEPTURL' => "https://monplanning.ovh/back.php?accepturl=1", // this url is called when the form is successfully posted by the user
    'PARAMETERS.EXCEPTIONURL' => "https://monplanning.ovh/back.php?exceptionurl=1",
    'PARAMETERS.DECLINEURL' => "https://monplanning.ovh/back.php?declineurl=1",
], true);



echo $res; // this will inject the ingenico form in the "payment" iframe

     *
     *
     *
     *
     *
     *
     */
    public function injectFlexFormToIframe($iFrameName, array $data, $isTest = false);

}