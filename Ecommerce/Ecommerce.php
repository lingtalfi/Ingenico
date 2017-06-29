<?php


namespace Ingenico\Ecommerce;


use Bat\ArrayTool;
use Ingenico\Config\IngenicoConfigInterface;
use Ingenico\Util\IngenicoUtil;

class Ecommerce implements EcommerceInterface
{
    /**
     * @var IngenicoConfigInterface
     */
    private $config;


    public function __construct(IngenicoConfigInterface $config)
    {
        $this->config = $config;
    }

    public function getPaymentFormButton(array $data, $isTest = false)
    {


        $keys = [
            "ORDERID" => '',
            "AMOUNT" => '',
            "CURRENCY" => '',
            "LANGUAGE" => '',
            "CN" => '',
            "EMAIL" => '',
            "OWNERZIP" => '',
            "OWNERADDRESS" => '',
            "OWNERCTY" => '',
            "OWNERTOWN" => '',
            "OWNERTELNO" => '',
        ];

        $otherKeys = [
            //
            'ALIAS' => '',
            'ALIASUSAGE' => '',
            'ACCEPTURL' => '',
            'DECLINEURL' => '',
            'EXCEPTIONURL' => '',
            'CANCELURL' => '',
            //
            'TITLE' => '',
            'BGCOLOR' => '',
            'TXTCOLOR' => '',
            'TBLBGCOLOR' => '',
            'TBLTXTCOLOR' => '',
            'BUTTONBGCOLOR' => '',
            'BUTTONTXTCOLOR' => '',
            'LOGO' => '',
            'FONTTYPE' => '',
        ];

        $baseKeys = array_merge($keys, $otherKeys);
        $data = array_merge($baseKeys, $data);

        IngenicoUtil::checkMandatoryKeys(array_keys($keys), $data);


        $mainData = ArrayTool::superimpose($data, $baseKeys);


        $conf = $this->config->getValues();
        $mainData["PSPID"] = $conf["PSPID"];
        $sign = IngenicoUtil::createShaSignature($mainData, $this->config->getPassPhrase("ecommerce"));

        $data = array_merge([
            "TEXT_SEND" => "Send",
        ], $mainData);


        if (false === $isTest) {
            $url = "https://secure.ogone.com/ncol/prod/orderstandard_utf8.asp";
        } else {
            $url = "https://ogone.test.v-psp.com/ncol/test/orderstandard_utf8.asp";
        }
        ob_start();
        ?>
        <form method="post" action="<?php echo $url; ?>" id=form1 name=form1>


            <!-- paramètres généraux : voir Paramètres de formulaire -->

            <input type="hidden" name="PSPID" value="<?php echo $mainData['PSPID']; ?>">
            <input type="hidden" name="ORDERID" value="<?php echo htmlspecialchars($mainData['ORDERID']); ?>">
            <input type="hidden" name="AMOUNT" value="<?php echo htmlspecialchars($mainData['AMOUNT']); ?>">
            <input type="hidden" name="CURRENCY" value="<?php echo htmlspecialchars($mainData['CURRENCY']); ?>">
            <input type="hidden" name="LANGUAGE" value="<?php echo htmlspecialchars($mainData['LANGUAGE']); ?>">
            <input type="hidden" name="CN" value="<?php echo htmlspecialchars($mainData['CN']); ?>">
            <input type="hidden" name="EMAIL" value="<?php echo htmlspecialchars($mainData['EMAIL']); ?>">
            <input type="hidden" name="OWNERZIP" value="<?php echo htmlspecialchars($mainData['OWNERZIP']); ?>">
            <input type="hidden" name="OWNERADDRESS" value="<?php echo htmlspecialchars($mainData['OWNERADDRESS']); ?>">
            <input type="hidden" name="OWNERCTY" value="<?php echo htmlspecialchars($mainData['OWNERCTY']); ?>">
            <input type="hidden" name="OWNERTOWN" value="<?php echo htmlspecialchars($mainData['OWNERTOWN']); ?>">
            <input type="hidden" name="OWNERTELNO" value="<?php echo htmlspecialchars($mainData['OWNERTELNO']); ?>">


            <!-- vérification avant le paiement : voir Sécurité : vérification avant le paiement -->


            <input type="hidden" name="SHASIGN" value="<?php echo $sign; ?>">

            <!-- apparence et impression: voir Apparence de la page de paiement -->

            <input type="hidden" name="TITLE" value="<?php echo htmlspecialchars($data['TITLE']); ?>">
            <input type="hidden" name="BGCOLOR" value="<?php echo htmlspecialchars($data['BGCOLOR']); ?>">
            <input type="hidden" name="TXTCOLOR" value="<?php echo htmlspecialchars($data['TXTCOLOR']); ?>">
            <input type="hidden" name="TBLBGCOLOR" value="<?php echo htmlspecialchars($data['TBLBGCOLOR']); ?>">
            <input type="hidden" name="TBLTXTCOLOR" value="<?php echo htmlspecialchars($data['TBLTXTCOLOR']); ?>">
            <input type="hidden" name="BUTTONBGCOLOR" value="<?php echo htmlspecialchars($data['BUTTONBGCOLOR']); ?>">
            <input type="hidden" name="BUTTONTXTCOLOR" value="<?php echo htmlspecialchars($data['BUTTONTXTCOLOR']); ?>">
            <input type="hidden" name="LOGO" value="<?php echo htmlspecialchars($data['LOGO']); ?>">
            <input type="hidden" name="FONTTYPE" value="<?php echo htmlspecialchars($data['FONTTYPE']); ?>">

            <!-- redirection après la transaction : voir Feedback au client sur la transaction -->

            <input type="hidden" name="ACCEPTURL" value="<?php echo htmlspecialchars($data['ACCEPTURL']); ?>">
            <input type="hidden" name="DECLINEURL" value="<?php echo htmlspecialchars($data['DECLINEURL']); ?>">
            <input type="hidden" name="EXCEPTIONURL" value="<?php echo htmlspecialchars($data['EXCEPTIONURL']); ?>">
            <input type="hidden" name="CANCELURL" value="<?php echo htmlspecialchars($data['CANCELURL']); ?>">


            <?php if ('' !== $data['ALIAS']): ?>
                <input type="hidden" name="ALIAS" value="<?php echo htmlspecialchars($data['ALIAS']); ?>">
            <?php endif; ?>

            <?php if ('' !== $data['ALIASUSAGE']): ?>
                <input type="hidden" name="ALIASUSAGE" value="<?php echo htmlspecialchars($data['ALIASUSAGE']); ?>">
            <?php endif; ?>

            <input type="submit" value="<?php echo htmlspecialchars($data['TEXT_SEND']); ?>" id=submit2 name=submit2>

        </form>
        <?php
        return ob_get_clean();
    }
}