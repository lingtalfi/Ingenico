<?php


use Ling\Ingenico\Handler\IngenicoHandler;


require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";

ini_set("display_errors", "1"); // tmp


$h = IngenicoHandler::createByConfFile(__DIR__ . "/ingenico.conf.php");

$visaTestCard = "4111111111111111";




$res = $h->flexCheckout()->getFlexForm([
    'CARD.BRAND' => "VISA",

//    'CARD.BIC' => "",
//    'CARD.BIN' => "",
    'ALIAS.ALIASID' => "fca-" . rand(1, 100000),
    'ALIAS.ORDERID' => "REF_" . rand(1, 100000),
    'ALIAS.STOREPERMANENTLY' => "Y",
    'PARAMETERS.ACCEPTURL' => "https://mysite.com/back.php?myaccepted-deferred",
    'PARAMETERS.EXCEPTIONURL' => "https://mysite.com/back.php?mycancelled-deferred",
], true);


/**
 * ["CreditCardInputModel_HashParameter"] => string(40) "883D2CFB9F9D18BFE94BEDA3B6C88D0BB8A92836"
 * ["CreditCardInputModel_AliasId"] => string(36) "53698A4E-D9AB-4762-A066-3665ACE6F974"
 * ["CreditCardInputModel_PspId"] => string(19) "MyPspId____________"
 * ["CreditCardInputModel_ExcludedPaymentMethods"] => string(0) ""
 * ["CreditCardInputModel_ExceptionUrl"] => string(53) "https://mysite.com/back.php?mycancelled-deferred"
 * ["CreditCardInputModel_StorePermanently"] => string(4) "True"
 * ["CreditCardInputModel_ParamPlus"] => string(0) ""
 * ["CreditCardInputModel_CreditDebit"] => string(0) ""
 * ["CreditCardInputModel_Brand"] => string(4) "VISA"
 * ["CreditCardInputModel_WorkflowId"] => string(6) "946972"
 * ["CreditCardInputModel_OrderId"] => string(12) "310109312231"
 * ["CreditCardInputModel_CardNumber"] => string(16) "4111111111111111"
 * ["CreditCardInputModel_CardHolderName"] => string(4) "paul"
 * ["CreditCardInputModel_CardExpirationMonth"] => string(2) "10"
 * ["CreditCardInputModel_CardExpirationYear"] => string(4) "2019"
 * ["CreditCardInputModel_Cvc"] => string(3) "123"
 * ["CreditCardInputModel_CanStoreAlias"] => string(5) "false"
 */

/**
 * Displaying this $res string will actually display a form to
 * collect the user's financial details (card number, cvc, expiration date, owner name).
 *
 * Warning: at this point of time,
 * I have a problem though (which might be solved tomorrow):
 * completing the form doesn't create the alias in the backoffice.
 *
 * I believe this is a misconfiguration error from me, so I publish this code anyway,
 * but be aware that this code might be updated sooner or later...
 */
echo $res;

