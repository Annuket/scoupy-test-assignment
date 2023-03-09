# Test assignment

[Test assignment][1] is a list of running cashback campaigns similar to the main page of the scoupy.com website.

Setup
------------

* For a standard build / setup, simply run
```docker compose up -d ```
* To unhide all hidden coupons, you can run
```docker compose exec app php cli/coupon_unhide ```
* To hide all coupons, you can run
```docker compose exec app php cli/coupon_hide ```
* or you can hide a list of individual coupons, adding a list of ids separated by spaces
```docker compose exec app php cli/coupon_hide 53498 53458 53482 53489 53472 ```

[1]: https://github.com/Annuket/scoupy-test-assignment