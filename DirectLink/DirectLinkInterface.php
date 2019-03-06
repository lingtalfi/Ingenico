<?php


namespace Ling\Ingenico\DirectLink;


use Ling\Ingenico\Request\Result\StandardIngenicoRequestResultInterface;

interface DirectLinkInterface
{

    /**
     * https://payment-services.ingenico.com/fr/fr/ogone/support/guides/integration%20guides/directlink
     * https://payment-services.ingenico.com/fr/fr/ogone/support/guides/integration%20guides/alias
     * @param array $data
     * @param bool $isTest
     * @return StandardIngenicoRequestResultInterface
     *
     */
    public function orderRequest(array $data, $isTest = false);

    /**
     * https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/directlink-3-d
     * @param array $data (same as orderRequest)
     * @param bool $isTest
     * @return StandardIngenicoRequestResultInterface
     */
    public function orderRequest3d(array $data, $isTest = false);

    /**
     * https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/directlink/maintenance
     *
     * @param array $data
     * @param bool $isTest
     * @return StandardIngenicoRequestResultInterface
     */
    public function maintenanceRequest(array $data, $isTest = false);

}