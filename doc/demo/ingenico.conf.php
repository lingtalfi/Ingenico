<?php


$conf = [
    'PSPID' => "_YOUR_PSPID_",
    'PSWD' => "_YOUR_PSPID_PASSWORD_",
    'USERID' => '_YOUR_USER_ID_', // api user id, https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/directlink/general-procedures-and-security-settings#apiuser
    'PASSPHRASE_DIRECTLINK' => "_YOUR_PASSPHRASE_FOR_DIRECTLINK_", // ingenico bo > Configuration > Data and origin verification > "Checks for DirectLink and Batch (Automatic)"
    'PASSPHRASE_ECOMMERCE' => "_YOUR_PASSPHRASE_FOR_ECOMMERCE_", // ingenico bo > Configuration > Data and origin verification > "Checks for e-Commerce & Alias Gateway"
    'PASSPHRASE_SHAOUT' => "_YOUR_PASSPHRASE_FOR_SHA_OUT", // ingenico bo > Configuration > Transition feedback > All transaction submission modes
];