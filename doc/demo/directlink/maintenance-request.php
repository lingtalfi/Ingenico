<?php


use Ingenico\Handler\IngenicoHandler;


/**
 * This is a kamille framework init.
 * If you use another framework, use your framework init.
 * The main goal is to prepare the autoloader.
 */
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


ini_set("display_errors", "1");


$h = IngenicoHandler::createByConfFile(__DIR__ . "/ingenico.conf.php"); // change the path accordingly; depends on your system

// https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/directlink/maintenance
$res = $h->directLink()->maintenanceRequest([
    "PAYID" => "3021908475",
    'AMOUNT' => '100',
    /**
     * See my directlink-operation-codes-overview.md document for a visual explanation
     * of how codes work.
     */
    "OPERATION" => "RFD",
], true);


if (true === $res->isSuccess()) {
    a("ok");
    a($res->getStatus());
    a($res->getValues());

} else {
    a("oops");
    $res->getErrorCode();
    a($res->getValues());
}