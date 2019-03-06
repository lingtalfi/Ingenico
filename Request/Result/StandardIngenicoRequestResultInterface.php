<?php


namespace Ling\Ingenico\Request\Result;


interface StandardIngenicoRequestResultInterface extends IngenicoRequestResultInterface
{

    public function isSuccess();

    // https://payment-services.ingenico.com/fr/fr/ogone/support/guides/user%20guides/statuses-and-errors/statuses
    public function getStatus();


    public function getErrorCode();

    /**
     * @return array of all values returned
     */
    public function getValues();

    /**
     * @return string|null
     */
    public function getHtmlContent();

}