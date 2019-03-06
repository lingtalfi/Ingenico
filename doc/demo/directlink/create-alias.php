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


// https://payment-services.ingenico.com/fr/fr/ogone/support/guides/integration%20guides/split-credit-debit-cards
$visaTestCard = "4111111111111111";
$masterCardTestCard = "5399999999999999";
$visa3ds = "4000000000000002";
$master3ds = "5300000000000006";

$h = IngenicoHandler::createByConfFile(__DIR__ . "/ingenico.conf.php"); // change the path accordingly; depends on your system

/**
 *
 *
 * Note: even if the method name ends with 3d (which stands for 3d secure),
 * the 3d secure system will only trigger it the card number is recognized as a 3d secure compliant card.
 *
 * If it's not, it falls back to a regular card system (without 3d secure).
 * You can check the res->getHtmlContent() and see if it's null (not 3d secure), or filled (3d secure)
 *
 * So it's actually an hybrid system.
 *
 *
 */
$res = $h->directLink()->orderRequest3d([

    /**
     * See the official documentation here:
     * https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/alias/creating-an-alias
     */
    "ALIAS" => "neptune",
    "CARDNO" => "4000000000000002", // 3d secure
//    "CARDNO" => "4111111111111111", // not 3d secure, uncomment to test this hybrid system
    "CVC" => "123",
    "ED" => "09/2019",
    "CN" => "Donatello",
    /**
     * Apparently, even if we only want to create an alias, this won't work (at least from my tests).
     * Adding some cheap/fake order info allows us to create an alias for (almost) free.
     * Todo: find the true free way to add aliases with alias manager?
     */
    "ORDERID" => "Create-alias-" . date("Y-m-d H:i:s"),
    "CURRENCY" => "EUR",
    "AMOUNT" => "1",
    "OPERATION" => "RES",


], true);


if (true === $res->isSuccess()) {

    if (null !== ($s3dForm = $res->getHtmlContent())) {
        echo $s3dForm;
    } else {
        a("ok");
        a($res->getStatus());
        a($res->getValues());
    }

} else {
    a("oops");
    $res->getErrorCode();
    a($res->getValues());
}