Ingenico
============
2017-06-29


Helper tools for implementing ingenico payment solutions.


Ecommerce, directLink, flexCheckout.

You should first familiarize yourself with Ingenico solutions: https://payment-services.ingenico.com/ogone/support/products/guide-map.

THEN, see if this planet can save you some time or not. 



Work in progress.





This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ingenico
```

Or just download it and place it where you want otherwise.






DirectLink operation codes overview
---------------------------
[![ingenico-directlink-operation-codes.jpg](https://s19.postimg.org/4b038m2n7/ingenico-directlink-operation-codes.jpg)](https://postimg.org/image/ov4x73ie7/)



How does it work?
======================

Browse the examples in the **doc/demo** directory of this repository for ready-to-run examples.


Basically, the examples cover those topics:


- DirectLink
    - NewOrder
        - Request a new order
        - Request a new order using 3-D Secure
        - Request a new order using an alias
    - Maintenance
        - Maintenance request
- DirectQuery (todo)
- Ecommerce
    - display the form, with or without alias
- FlexCheckout
    - display the flex checkout form














History Log
------------------
    
- 1.0.0 -- 2017-06-29

    - initial commit