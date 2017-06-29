Payment statuses
==================

The table below summarises the possible statuses of the payments.

Statuses in 1 digit are 'normal' statuses:

- 0 or 1 means the payment entry was not completed either because it is still underway or because interrupted or because a validation error prevented from confirming. If the cause is a validation error, an additional error code (*) (NCERROR) identifies the error. 
- 2 means the acquirer did not authorise the payment.
- 5 means the acquirer authorised the payment.
- 9 means the payment was captured.

Statuses in 2 digits corresponds either to  'intermediary' situations or to abnormal events. When the second digit  is:

- 1, this means the payment processing is on hold.
- 2, this means an error occurred during the communication with the acquirer. The result is therefore not determined. You must therefore call the acquirer's helpdesk to find out the actual result of this transaction.
- 3, this means the payment processing (capture or cancellation) was refused by the acquirer whilst the payment had been authorised beforehand. It can be due to a technical error or to the expiration of the autorisation. You must therefore call the acquirer's helpdesk to find out the actual result of this transaction.





0 	Invalid or incomplete
1 	Cancelled by customer
2 	Authorisation declined
4 	Order stored
40 	Stored waiting external result
41 	Waiting for client payment
46 	Waiting authentication
5 	Authorised
50 	Authorized waiting external result
51 	Authorisation waiting
52 	Authorisation not known
55 	Standby
56 	OK with scheduled payments
57 	Not OK with scheduled payments
59 	Authoris. to be requested manually
6 	Authorised and cancelled
61 	Author. deletion waiting
62 	Author. deletion uncertain
63 	Author. deletion refused
64 	Authorised and cancelled
7 	Payment deleted
71 	Payment deletion pending
72 	Payment deletion uncertain
73 	Payment deletion refused
74 	Payment deleted
75 	Deletion handled by merchant
8 	Refund
81 	Refund pending
82 	Refund uncertain
83 	Refund refused
84 	Refund
85 	Refund handled by merchant
9 	Payment requested
91 	Payment processing
92 	Payment uncertain
93 	Payment refused
94 	Refund declined by the acquirer
95 	Payment handled by merchant
96 	Refund reversed
99 	Being processed







Error codes
===================

The list of error messages is not exhaustive and contains error messages that could not be relevant for a specific merchant. This reference table will help you to identify what a new error code stands for.

In general, error codes starting with

- 2: uncertain status. Will evolve to a final status.
- 3: transaction declined by the acquirer
- 4: transaction declined. It could be only a temporary technical problem. Please retry a little bit later.
- 5: validation/configuration error (f.i. : currency not allowed on your account,...). 
    
    
    

10001001 	No 	Communication failure
10001002 	No 	Communication failure
10001003 	No 	Communication failure
10001004 	No 	Communication failure
10001005 	No 	Communication failure
10001016 	No 	Waiting for acquirer feedback
10001018 	No 	3XCB pending transaction awaiting for Final status
10001101 	No 	You must connect in secure mode (https)
20001001 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the transaction status within one working day. Please check the status later.
20001002 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the status of the transaction within one working day. Please check the status later.
20001003 	No 	We received an unknown status for the transaction. We will contact your acquirer and update the status of the transaction. Please check the status later.
20001004 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the transaction status within one working day. Please check the status later.
20001005 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the transaction status within one working day. Please check the status later.
20001006 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the transaction status within one working day. Please check the status later.
20001007 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the transaction status within one working day. Please check the status later.
20001008 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the transaction status within one working day. Please check the status later.
20001009 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the transaction status within one working day. Please check the status later.
20001010 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the transaction status within one working day. Please check the status later.
20001101 	No 	A technical problem has occurred. Please contact the helpdesk.
20001104 	No 	We received an unknown status for the transaction. We will contact your acquirer and update the status of the transaction. Please check the status later.
20001105 	No 	We have received an unknown status for the transaction. We shall contact your acquirer and update the transaction status within one working day. Please check the status later.
20001111 	No 	A technical problem has occurred. Please contact the helpdesk.
20001998 	No 	We received an unknown status for the transaction. We will contact your acquirer and update the status of the transaction. Please check the status later.
20002001 	No 	Bank response origin cannot be checked
20002002 	No 	Beneficiary account number has been modified during processing
20002003 	No 	Amount has been modified during processing
20002004 	No 	Currency has been modified during processing
20002005 	No 	No feedback detected from the bank server
30001001 	No 	Payment refused by the financial institution
30001002 	No 	Duplicate request
30001010 	Yes 	A technical problem has occurred. Please contact the helpdesk.
30001011 	Yes 	A technical problem has occurred. Please contact the helpdesk.
30001012 	No 	Card blacklisted - Contact acquirer
30001015 	Yes 	There has been a connection error to the receiving bank. Please try later or choose another payment method.
30001016 	No 	Transmission failure and/or Database error. The transaction could not be properly initialised in the send process (db access failures, etc.)
30001051 	No 	A technical problem has occurred. Please contact the helpdesk.
30001054 	No 	A technical problem has occurred. Please contact the helpdesk.
30001056 	No 	Your merchant's acquirer is temporarily unavailable, please try later or choose another payment method.
30001057 	Yes 	There has been a connection error to the receiving bank. Please try later or choose another payment method.
30001058 	Yes 	There has been a connection error to the receiving bank. Please try later or choose another payment method.
30001060 	No 	Acquirer has indicated a failure during payment processing
30001070 	No 	RATEPAY Invalid Response Type (Failure)
30001071 	No 	RATEPAY Missing Mandatory status code field (failure)
30001072 	No 	RATEPAY Missing Mandatory Result code field (failure)
30001073 	No 	RATEPAY Response parsing Failed
30001090 	No 	CVC check required by front end and returned invalid by acquirer
30001091 	No 	Postcode check required by front end and returned invalid by acquirer
30001092 	No 	Address check required by frontend and returned as invalid by acquirer.
30001095 	No 	CVC check failed after transaction processed
30001096 	No 	AAV check failed after transaction processed
30001100 	No 	Unauthorised customer country
30001101 	No 	IP country differs from card country
30001102 	No 	Number of different countries too high
30001103 	No 	unauthorised card country
30001104 	No 	unauthorised IP address country
30001105 	No 	Anonymous proxy
30001106 	No 	Unknown IP address country
30001106 	No 	Unknown IP address country
30001110 	No 	If the problem persists, please contact Support or go to paysafecard's card balance page (https://customer.cc.at.paysafecard.com/psccustomer/GetWelcomePanelServlet?language=en), to see when the amount reserved on your card will be available again.
30001120 	No 	IP address on merchant's blacklist
30001130 	No 	BIN on merchant's blacklist
30001131 	No 	Wrong BIN for 3xCB
30001140 	No 	Card on merchant's blacklist
30001141 	No 	E-mail blacklisted
30001142 	No 	Passenger name blacklisted
30001143 	No 	Cardholder name blacklisted
30001144 	No 	Passenger name different from owner name
30001145 	No 	Time to departure too short
30001149 	No 	Card Configured in Card Supplier Limit for another relation (CSL)
30001150 	No 	Card not configured in the system for this customer (CSL)
30001151 	No 	REF1 not allowed for this relationship (Contract number)
30001152 	No 	Card/Supplier Amount limit reached (CSL)
30001153 	No 	Card not permitted for this supplier (Date out of contractual limits)
30001154 	No 	You have reached the permitted usage limit.
30001155 	No 	You have reached the permitted usage limit.
30001156 	No 	You have reached the permitted usage limit
30001157 	No 	Unauthorised IP country for itinerary
30001158 	No 	e-mail usage limit reached
30001159 	No 	Unauthorised card country/IP country combination
30001160 	No 	Postcode in high-risk group
30001161 	No 	generic blacklist match
30001162 	No 	Invoicing Address is a PO Box
30001163 	No 	Airport in high-risk group
30001164 	No 	Shipping Method in high-risk group
30001165 	No 	Shipping Method Details in high-risk group
30001166 	No 	Product Category in high-risk group
30001167 	No 	Subbrand in high-risk group
30001168 	No 	Issuer Number in high-risk group
30001169 	No 	Time to delivery too short
30001170 	No 	Device marked as high risk
30001180 	No 	maximum scoring reached
30001200 	No 	This recurring transaction is not allowed anymore by the financial institution. Please check cardholder's details.
30001201 	No 	{0} does not exist.
30001202 	No 	No data found.
30001203 	No 	{0} is not updated.
30001204 	No 	Some of the data entered is incorrect. Please retry.
30001205 	No 	Your account has been terminated. Please contact us.
30001206 	No 	The maximum permitted number of users has been reached. Please contact us in order to upgrade your account.
30001207 	No 	This user id already exists. Please choose another.
30001208 	No 	This external userid already exists. Please choose another.
30001997 	No 	Authorisation cancelled by simulator
30001998 	Yes 	A technical problem has occurred. Please try again.
30001999 	Yes 	There has been a connection error with the receiving bank. Please try later or choose another payment method.
30002001 	No 	Payment refused by the financial institution
30002001 	No 	Payment refused by the financial institution
30021001 	No 	Please call the acquirer support call number.
30022001 	No 	Payment must be approved by the acquirer prior to execution.
30031001 	No 	Invalid merchant number
30041001 	No 	Retain card.
30051001 	No 	Authorisation declined
30051002 	No 	Voor vragen over uw afwijzing kunt u contact opnemen met de Klantenservice van AfterPay.
30051009 	No 	It is possible that you may not have completed all the required information (correctly) during the order process.
30051010 	No 	because your age is under 18. For more information please visit website of AfterPay.
30051011 	No 	because your address could not be validated. For more information please visit website of AfterPay.
30051012 	No 	because your emailadres is invalid. For more information please visit website van AfterPay.
30051013 	No 	because the order amount extends the limit for first time AfterPay users. For more information please visit website of AfterPay.
30051014 	No 	because there are currently too many outstanding payments at AfterPay. For more information please visit website of AfterPay.
30051015 	No 	because your chamber of commerce number could not be validated. For more information please visit website of AfterPay.
30051016 	No 	because the order amount is too low. For more information please visit website of AfterPay.
30051017 	No 	. For more information please visit website of AfterPay.
30071001 	No 	Retain card - special conditions.
30121001 	No 	Invalid transaction
30131001 	No 	Invalid amount
30131002 	No 	You have reached the permitted limit
30141001 	No 	Invalid card number
30151001 	No 	Unknown acquiring institution
30171001 	No 	Payment method cancelled by the customer.
30171002 	No 	The maximum time allowed has elapsed.
30191001 	No 	Please try again later.
30201001 	No 	A technical problem has occurred. Please contact the helpdesk.
30301001 	No 	Invalid format
30311001 	No 	Unknown acquirer ID.
30331001 	No 	Card expired
30341001 	No 	Suspicion of fraud.
30341001 	No 	Suspicion of fraud.
30341002 	No 	Suspicion of fraud (3rdMan)
30341003 	No 	Suspicion of fraud (Perseuss)
30341004 	No 	Suspicion of fraud (ETHOCA)
30341005 	No 	Suspicion of fraud (Expert)
30381001 	No 	A technical problem has occurred. Please contact the helpdesk.
30401001 	No 	Invalid function
30411001 	No 	Lost card
30431001 	No 	Stolen card. Pick up.
30511001 	No 	Insufficient funds
30521001 	No 	No Authorisation. Please contact your card issuer.
30541001 	No 	Card expired
30551001 	No 	Invalid security code
30561001 	No 	Card not in authoriser's database.
30571001 	No 	Transaction not permitted on card
30581001 	No 	Transaction not permitted on this terminal
30591001 	No 	Suspicion of fraud
30601001 	No 	The merchant should contact the acquirer.
30611001 	Yes 	Amount exceeds card limit
30621001 	No 	Restricted card
30631001 	No 	Security policy not respected
30641001 	No 	Amount changed from ref. transaction.
30681001 	No 	The maximum allowed time has elapsed.
30751001 	No 	Incorrect PIN entered too many times
30761001 	No 	Already disputed by cardholder.
30771001 	No 	PIN entry required
30811001 	No 	Message flow error
30821001 	No 	Authorisation centre unavailable
30831001 	No 	Authorisation centre unavailable
30891001 	No 	Authentication failure
30901001 	No 	Temporary system shutdown
30911001 	No 	Acquirer unavailable
30921001 	No 	Invalid card type for acquirer
30941001 	No 	Duplicate transaction
30961001 	Yes 	Processing temporarily not possible
30971001 	No 	A technical problem has occurred. Please contact the helpdesk.
30981001 	No 	A technical problem has occurred. Please contact the helpdesk.
31011001 	No 	Unknown acceptance code
31021001 	No 	Invalid currency
31031001 	No 	Acceptance code missing
31041001 	No 	Inactive card
31051001 	No 	Merchant not active
31061001 	No 	Invalid expiry date
31071001 	No 	Interrupted host communication
31081001 	No 	Card refused
31091001 	No 	Invalid password
31101001 	No 	Plafond transaction (majoré du bonus) dépassé
31111001 	No 	Plafond mensuel (majoré du bonus) dépassé
31121001 	No 	Plafond centre de facturation dépassé
31131001 	No 	Plafond entreprise dépassé
31141001 	No 	Code MCC du fournisseur non autorisé pour la carte
31151001 	No 	Numéro SIRET du fournisseur non autorisé pour la carte
31161001 	No 	This is not a valid online bank account
31171001 	No 	Cardholder has cancelled the recurring payment. Any further recurring payment will be declined.
32001004 	No 	A technical problem has occurred. Please try again.
32001105 	No 	A technical problem has occurred. Please contact the helpdesk.
34011001 	No 	Bezahlung mit RatePAY nicht möglich.
39991001 	No 	A technical problem has occurred. Please contact your acquirer's helpdesk.
40001001 	Yes 	A technical problem has occurred. Please try again.
40001002 	Yes 	A technical problem has occurred. Please try again.
40001003 	Yes 	A technical problem has occurred. Please try again.
40001004 	Yes 	A technical problem has occurred. Please try again.
40001005 	Yes 	A technical problem has occurred. Please try again.
40001006 	Yes 	A technical problem has occurred. Please try again.
40001007 	Yes 	A technical problem has occurred. Please try again.
40001008 	Yes 	A technical problem has occurred. Please try again.
40001009 	Yes 	A technical problem has occurred. Please try again.
40001010 	Yes 	A technical problem has occurred. Please try again.
40001011 	No 	A technical problem has occurred. Please contact the helpdesk.
40001012 	Yes 	There has been a connection error with the receiving bank. Please try later or choose another payment method.
40001013 	No 	A technical problem has occurred. Please contact the helpdesk.
40001016 	No 	A technical problem has occurred. Please contact the helpdesk.
40001018 	Yes 	A technical problem has occurred. Please try again.
40001019 	Yes 	Sorry, an error has occurred during processing. Please retry the transaction (using the Back button of the browser). If the problem persists, contact your merchant's helpdesk.
40001020 	Yes 	Sorry, an error occurred during processing. Please retry the operation (using the Back button of the browser). If the problem persists, please contact your merchant's helpdesk.
40001050 	No 	A technical problem has occurred. Please contact the helpdesk.
40001133 	No 	Authentication failed. Incorrect signature for your bank's access control server.
40001134 	Yes 	Authentication failed. Please retry or cancel.
40001135 	Yes 	Authentication temporarily unavailable. Please retry or cancel.
40001136 	Yes 	Technical problem with your browser. Please retry or cancel.
40001137 	Yes 	Your bank is temporarily unavailable. Please try again later or choose another payment method.
40001202 	No 	This action is not authorized for your profile.
40001203 	No 	Current user is not authenticated
40001210 	No 	Your password must contain at least one letter (a-z) and at least one number (0-9) or symbol (&,@,#,!, etc.).
40001998 	No 	Temporary technical problem. Please retry later.
50001001 	No 	Unknown card type
50001002 	No 	Card number format check failed for given card number.
50001003 	No 	Merchant data error
50001004 	No 	Merchant identification missing
50001005 	No 	Expiry date error
50001006 	No 	Amount is not a number
50001007 	No 	A technical problem has occurred. Please contact the helpdesk.
50001008 	No 	A technical problem has occurred. Please contact the helpdesk.
50001009 	No 	A technical problem has occurred. Please contact the helpdesk.
50001010 	No 	A technical problem has occurred. Please contact the helpdesk.
50001011 	No 	Brand not supported for that merchant
50001012 	No 	A technical problem has occurred. Please contact the helpdesk.
50001013 	No 	A technical problem has occurred. Please contact the helpdesk.
50001014 	No 	A technical problem has occurred. Please contact the helpdesk.
50001015 	No 	Invalid currency code
50001016 	No 	A technical problem has occurred. Please contact the helpdesk.
50001017 	No 	A technical problem has occurred. Please contact the helpdesk.
50001018 	No 	A technical problem has occurred. Please contact the helpdesk.
50001019 	No 	A technical problem has occurred. Please contact the helpdesk.
50001020 	No 	A technical problem has occurred. Please contact the helpdesk.
50001021 	No 	A technical problem has occurred. Please contact the helpdesk.
50001022 	No 	A technical problem has occurred. Please contact the helpdesk.
50001023 	No 	A technical problem has occurred. Please contact the helpdesk.
50001024 	No 	A technical problem has occurred. Please contact the helpdesk.
50001025 	No 	A technical problem has occurred. Please contact the helpdesk.
50001026 	No 	A technical problem has occurred. Please contact the helpdesk.
50001027 	No 	A technical problem has occurred. Please contact the helpdesk.
50001028 	No 	A technical problem has occurred. Please contact the helpdesk.
50001029 	No 	A technical problem has occurred. Please contact the helpdesk.
50001030 	No 	A technical problem has occurred. Please contact the helpdesk.
50001031 	No 	A technical problem has occurred. Please contact the helpdesk.
50001032 	No 	A technical problem has occurred. Please contact the helpdesk.
50001033 	No 	A technical problem has occurred. Please contact the helpdesk.
50001034 	No 	A technical problem has occurred. Please contact the helpdesk.
50001035 	No 	A technical problem has occurred. Please contact the helpdesk.
50001036 	No 	Incorrect card length for the brand
50001037 	No 	Purchasing card number for a standard merchant
50001038 	No 	You should use a purchasing card for this transaction.
50001039 	No 	Details sent for a non-purchasing card merchant. Please contact the helpdesk.
50001040 	No 	Details not sent for a purchasing card transaction. Please contact the helpdesk.
50001041 	No 	Payment detail validation failed
50001042 	No 	Sum of given transaction amounts (tax, discount, delivery, net, etc.) does not match total.
50001043 	No 	A technical problem has occurred. Please contact the helpdesk.
50001044 	No 	No acquirer configured for this operation
50001045 	No 	No UID configured for this operation
50001046 	No 	Operation not permitted for the merchant
50001047 	No 	A technical problem has occurred. Please contact the helpdesk.
50001048 	No 	A technical problem has occurred. Please contact the helpdesk.
50001049 	No 	A technical problem has occurred. Please contact the helpdesk.
50001050 	No 	A technical problem has occurred. Please contact the helpdesk.
50001051 	No 	A technical problem has occurred. Please contact the helpdesk.
50001052 	No 	A technical problem has occurred. Please contact the helpdesk.
50001053 	No 	A technical problem has occurred. Please contact the helpdesk.
50001054 	No 	Card number incorrect or incompatible
50001055 	No 	A technical problem has occurred. Please contact the helpdesk.
50001056 	No 	A technical problem has occurred. Please contact the helpdesk.
50001057 	No 	A technical problem has occurred. Please contact the helpdesk.
50001058 	No 	A technical problem has occurred. Please contact the helpdesk.
50001059 	No 	A technical problem has occurred. Please contact the helpdesk.
50001060 	No 	A technical problem has occurred. Please contact the helpdesk.
50001061 	No 	A technical problem has occurred. Please contact the helpdesk.
50001062 	No 	A technical problem has occurred. Please contact the helpdesk.
50001063 	No 	Card Issue Number does not correspond to range or is not present
50001064 	No 	Start Date invalid or not present
50001066 	No 	Invalid CVC code format
50001067 	No 	The merchant is not registered for 3D-Secure
50001068 	No 	Invalid card number or account number (PAN)
50001069 	No 	Invalid CardID and Brand match
50001070 	No 	The ECI value is either not supported or conflicts with other transaction data
50001071 	No 	Incomplete TRN demat
50001072 	No 	Incomplete PAY demat
50001073 	No 	No demat APP
50001074 	No 	Authorisation period expired
50001075 	No 	VERRes was an error message
50001076 	No 	DCP amount greater than authorisation amount
50001077 	No 	Details negative amount
50001078 	No 	Details negative quantity
50001079 	No 	Could not decode/decompress received PARes (3-D Secure)
50001080 	No 	Received PARes was an error message from ACS (3-D Secure)
50001081 	No 	Received PARes format was invalid according to the 3-D Secure specifications (3-D Secure)
50001082 	No 	PAReq/PARes reconciliation failure (3-D Secure)
50001084 	No 	Maximum amount reached
50001087 	No 	This transaction requires authentication. Please check with your bank.
50001090 	No 	CVC missing at input, but CVC check requested
50001091 	No 	Postcode missing at input, but postcode check requested
50001092 	No 	Address missing at input, but Address check requested
50001093 	No 	Partial capture not allowed
50001095 	No 	Invalid date of birth
50001096 	No 	Invalid commodity code
50001097 	No 	The requested currency and brand are incompatible.
50001098 	No 	The payment's authorisation has already been captured and can't be captured again
50001111 	No 	Data validation error
50001113 	No 	This order has already been processed.
50001114 	No 	Error in accessing the pre-payment check page
50001115 	No 	Request not received in secure mode
50001116 	No 	Unknown IP address origin
50001117 	No 	No IP address origin
50001118 	No 	PSPID not found or incorrect
50001119 	No 	Password incorrect or disabled due to number of errors
50001120 	No 	Invalid currency
50001121 	No 	Invalid number of decimals for the currency
50001122 	No 	Currency not accepted by the merchant
50001123 	No 	Card type not active
50001124 	No 	Number of lines doesn't match the number of payments
50001125 	No 	Format validation error
50001126 	No 	Overflow in data capture requests for the original order
50001127 	No 	Incorrect original order status
50001128 	No 	missing authorisation code for unauthorised order
50001129 	No 	Overflow in refunds requests
50001130 	No 	Original order access error
50001131 	No 	Original history item access error
50001132 	No 	The selected Catalogue is empty
50001133 	No 	Duplicate request
50001134 	No 	Authentication failed. Please retry or cancel.
50001135 	No 	Authentication temporarily unavailable. Please retry or cancel.
50001136 	No 	Technical problem with your browser. Please retry or cancel.
50001137 	No 	Your bank is temporarily unavailable. Please try again later or choose another payment method.
50001150 	No 	Fraud Detection: technical error (invalid IP)
50001151 	No 	Fraud detection: technical error (IPCTY unknown or error)
50001152 	No 	Fraud detection: technical error (CCCTY unknown or error)
50001153 	No 	Overflow in redo-authorisation requests
50001170 	No 	Dynamic BIN check failed
50001171 	No 	Dynamic country check failed
50001172 	No 	Amadeus signature error
50001174 	Yes 	Cardholder Name is too long
50001175 	No 	Name contains invalid characters
50001176 	No 	Card number is too long
50001177 	No 	Card number contains non-numeric info
50001178 	No 	Card Number Empty
50001179 	No 	CVC too long
50001180 	No 	CVC contains non-numeric info
50001181 	No 	Expiry date contains non-numeric info
50001182 	No 	Invalid expiry month
50001183 	No 	Expiry date must be in the future
50001184 	No 	SHA Mismatch
50001185 	No 	Incorrect BIC code length
50001186 	No 	Operation not permitted
50001187 	No 	Operation not permitted
50001191 	No 	{0} length cannot be more than {1} characters.
50001192 	No 	Only alphanumeric characters are allowed.
50001193 	No 	Only {0} characters and special characters {1} are allowed.
50001194 	No 	{0} is invalid.
50001195 	No 	{0} length should be between {2} and {1} characters.
50001205 	No 	Missing mandatory fields in invoicing address
50001206 	No 	Missing mandatory date of birth field.
50001207 	No 	Missing required shopping basket details
50001208 	No 	Missing social security number
50001209 	No 	Invalid country code
50001210 	No 	Missing annual salary
50001211 	No 	Missing gender
50001212 	No 	Missing e-mail
50001213 	No 	Missing IP address
50001214 	No 	Missing part-payment campaign ID
50001215 	No 	Missing invoice number
50001216 	No 	The alias must be different to the card number.
50001217 	No 	Invalid details for shopping basket calculation
50001218 	No 	No Refunds allowed
50001220 	No 	Invalid format of phone number
50001221 	No 	Invalid ZIP format
50001222 	No 	Firstname or/and lastname missing
50001223 	No 	Firstname and/or lastname format invalid
50001224 	No 	The phone number is missing.
50001225 	No 	Invalid email format
50001300 	No 	Wrong brand/payment method
50001301 	No 	Wrong account number format
50001302 	No 	RFP operation code is only permitted with scheduled payments.
50001303 	No 	RFP operation code not permitted for a Disputed payment
50001304 	No 	RFP operation code not permitted - Unpaid amounts
50001501 	No 	{0} is required.
5001133 	No 	Duplicate order ID. A Token has already been created/updated with order id {0}
55555555 	No 	An error occurred.
60000001 	No 	account number unknown
60000003 	No 	not credited dd-mm-yy
60000005 	No 	name/number do not match
60000007 	No 	account number blocked
60000008 	No 	specific direct debit block
60000009 	No 	account number WKA
60000010 	No 	administrative reason
60000011 	No 	account number expired
60000012 	No 	no direct debit authorisation
60000013 	No 	debit not approved
60000014 	No 	double payment
60000018 	No 	name/address/city not entered
60001001 	No 	no original direct debit for revocation
60001002 	No 	payer’s account number format error
60001004 	No 	payer’s account at different bank
60001005 	No 	payee’s account at different bank
60001006 	No 	payee’s account number format error
60001007 	No 	payer’s account number blocked
60001008 	No 	payer’s account number expired
60001009 	No 	payee’s account number expired
60001010 	No 	direct debit not possible
60001011 	No 	creditor payment not possible
60001012 	No 	payer’s account number unknown WKA-number
60001013 	No 	payee’s account number unknown WKA-number
60001014 	No 	WKA transaction not permitted
60001015 	No 	revocation period expired
60001017 	No 	incorrect revocation reason
60001018 	No 	original run number not numeric
60001019 	No 	payment ID incorrect
60001020 	No 	amount not numeric
60001021 	No 	zero amount not permitted
60001022 	No 	negative amount not permitted
60001023 	No 	payer and payee giro account number
60001025 	No 	processing code (verwerkingscode) incorrect
60001028 	No 	revocation not permitted
60001029 	No 	guaranteed direct debit on giro account number
60001030 	No 	NBC transaction type incorrect
60001031 	No 	description too long
60001032 	No 	book account number not issued
60001034 	No 	book account number incorrect
60001035 	No 	payer’s account number not numeric
60001036 	No 	payer’s account number not eleven-proof
60001037 	No 	payer’s account number not issued
60001039 	No 	payer’s account number of DNB/BGC/BLA
60001040 	No 	payee’s account number not numeric
60001041 	No 	payee’s account number not eleven-proof
60001042 	No 	payee’s account number not issued
60001044 	No 	payee’s account number unknown
60001050 	No 	payee’s name missing
60001051 	No 	indicate payee’s bank account number instead of 3102
60001052 	No 	no direct debit contract
60001053 	No 	amount beyond limits
60001054 	No 	selective direct debit block
60001055 	No 	original run number unknown
60001057 	No 	payer’s name missing
60001058 	No 	payee’s account number missing
60001059 	No 	restore not permitted
60001060 	No 	bank’s reference (navraaggegeven) missing
60001061 	No 	BEC/GBK number incorrect
60001062 	No 	BEC/GBK code incorrect
60001087 	No 	book account number not numeric
60001090 	No 	cancelled on request
60001091 	No 	cancellation order executed
60001092 	No 	cancelled instead of ended
60001093 	No 	book account number is a shortened account number
60001094 	No 	instructing party and payer account numbers do not match
60001095 	No 	payee unknown GBK acceptor
60001097 	No 	instructing party and payee account numbers do not match
60001099 	No 	clearing not permitted
60001101 	No 	payer’s account number has no spaces
60001102 	No 	PAN length not numeric
60001103 	No 	PAN length outside limits
60001104 	No 	track number not numeric
60001105 	No 	track number not valid
60001106 	No 	PAN sequence number not numeric
60001107 	No 	domestic PAN not numeric
60001108 	No 	domestic PAN not eleven-proof
60001109 	No 	domestic PAN not issued
60001110 	No 	foreign PAN not numeric
60001111 	No 	card validity date not numeric
60001112 	No 	book period number (boekperiodenr) not numeric
60001113 	No 	transaction number not numeric
60001114 	No 	transaction time not numeric
60001115 	No 	invalid transaction time
60001116 	No 	transaction date not numeric
60001117 	No 	invalid transaction date
60001118 	No 	STAN not numeric
60001119 	No 	instructing party’s name missing
60001120 	No 	foreign amount (bedrag-vv) not numeric
60001122 	No 	rate (verrekenkoers) not numeric
60001125 	No 	number of decimals (aantaldecimalen) incorrect
60001126 	No 	tariff (tarifering) not B/O/S
60001127 	No 	domestic costs (kostenbinnenland) not numeric
60001128 	No 	domestic costs (kostenbinnenland) not higher than zero
60001129 	No 	foreign costs (kostenbuitenland) not numeric
60001130 	No 	foreign costs (kostenbuitenland) not higher than zero
60001131 	No 	domestic costs (kostenbinnenland) not zero
60001132 	No 	foreign costs (kostenbuitenland) not zero
60001134 	No 	Euro record not completed
60001135 	No 	Customer currency incorrect
60001136 	No 	NLG amount not numeric
60001137 	No 	NLG amount not higher than zero
60001138 	No 	NLG amount not equal to Amount
60001139 	No 	NLG amount incorrectly converted
60001140 	No 	EUR amount not numeric
60001141 	No 	EUR amount not greater than zero
60001142 	No 	EUR amount not equal to Amount
60001143 	No 	EUR amount incorrectly converted
60001144 	No 	Customer currency not NLG
60001145 	No 	rate euro-vv (Koerseuro-vv) not numeric
60001146 	No 	comma rate euro-vv (Kommakoerseuro-vv) incorrect
60001147 	No 	invalid acceptgiro distributor
60001148 	No 	Original run number and/or BRN missing
60001149 	No 	Amount/Account number/ BRN different
60001150 	No 	Direct debit already revoked/restored
60001151 	No 	Direct debit already reversed/revoked/restored
60001153 	No 	Payer’s account number not known
70000000 	No 	An unexpected occurs. For more information, the merchant should contact the support
70000001 	No 	The line is empty
70000002 	No 	No separator found
70000003 	No 	No operation code found
70000004 	No 	Operation code unknown
70000005 	No 	Field missing in position '{0}'
70000006 	No 	Too many fields are provided: {0} fields are required maximum
70000007 	No 	Alias empty
70000008 	No 	The PSPID is empty
70000009 	No 	Alias does not exist
70000010 	No 	Alias or PSPID empty
70000011 	No 	An internal error occurs
70000012 	No 	The merchant is not authorized to process the operation
70000013 	No 	The field '{0}' cannot have more than {1} characters
70000014 	No 	The field '{0}' cannot have less than {1} characters
70000015 	No 	The field '{0}' is mandatory
70000016 	No 	The field '{0}' cannot contain the value '{1}'
70000017 	No 	The field '{0}' is not formatted correctly
70000018 	No 	The field '{0}' contains invalid characters
70000019 	No 	The Payment Card Brand submitted does not match the brand detected
70000020 	No 	No merchant found for submitted PSPID
70000021 	No 	Alias already exists




