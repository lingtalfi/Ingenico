<?php


use Ling\Ingenico\Handler\IngenicoHandler;


/**
 * This is a kamille framework init.
 * If you use another framework, use your framework init.
 * The main goal is to prepare the autoloader.
 */
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


ini_set("display_errors", "1");


$h = IngenicoHandler::createByConfFile(__DIR__ . "/ingenico.conf.php"); // change the path accordingly; depends on your system



/**
 * sFormBtn is an html button which leads to the e-commerce form
 * hosted by ingenico.
 */
$sFormBtn = $h->ecommerce()->getPaymentFormButton([

    /**
     * Not all parameters are mandatory, please check the doc to see which are and which are not.
     */
    // https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/e-commerce
    "ORDERID" => "REF_" . date("Y-m-d H:i:s"),
    "AMOUNT" => "100",
    "CURRENCY" => "EUR",
    "LANGUAGE" => "fr_FR",
    "CN" => "Rabbit",
    "EMAIL" => "roger_rabbit@gmail.com",
    "OWNERZIP" => "37000",
    "OWNERADDRESS" => "2 rue verte",
    "OWNERCTY" => "France",
    "OWNERTOWN" => "Tours",
    "OWNERTELNO" => "0247609841",
    //
    "ACCEPTURL" => "https://mysite.com/back.php?type=accept",
    "DECLINEURL" => "https://mysite.com/back.php?type=decline",
    "EXCEPTIONURL" => "https://mysite.com/back.php?type=exception",
    "CANCELURL" => "https://mysite.com/back.php?type=cancel",
    //
    "TITLE" => "MY TITLE",
    //
    "TEXT_SEND" => "Envoyer",


    /**
     * With alias.
     * Uncomment (and adapt) the following parameters
     * if you want to use an alias.
     */
    // https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/alias
//    "ALIAS" => "ma-407225",
//    "ALIASUSAGE" => "e-card wallet",
//    "ECI" => "9",


], true);


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>

hello
<?php echo $sFormBtn; ?>

</body>
</html>

<?php
