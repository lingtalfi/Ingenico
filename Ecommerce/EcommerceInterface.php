<?php


namespace Ingenico\Ecommerce;


interface EcommerceInterface
{

    /**
     * https://payment-services.ingenico.com/fr/fr/ogone/support/guides/integration%20guides/e-commerce
     *
     * @param array $data
     *      - PSPID
     *      - ORDERID
     *      - AMOUNT
     *      - CURRENCY
     *      - LANGUAGE
     *      - CN
     *      - EMAIL
     *      - OWNERADDRESS
     *      - OWNERZIP
     *      - OWNERTOWN
     *      - OWNERCTY
     *      - OWNERTELNO
     *
     *      // to store an alias, use those extra params
     *      - ALIAS
     *      - ALIASUSAGE
     *
     *      // to use alias with recurring transactions, add this
     *      - ECI: 9
     *
     *
     *
     * @return string, a form with hidden fields that looks like a button
     */
    public function getPaymentFormButton(array $data, $isTest = false);
}