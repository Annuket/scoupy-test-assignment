<?php

namespace App;

class Config
{
    /**
     * header: The API-key used to identify the client application. 
     * Required
     * @var string
     */
    const X_SCOUPY_KEY = 'oe50sz9wxsblfpuvh3yzvjyoxgwxnn18vdvj42ge1l';

    /**
     * header: The current app-version as an integer.
     * Required
     * @var int
     */
    const X_SCOUPY_VERSION = 50000;

    /**
     * header: The user-key to identify the current user for the request.
     * @var string
     */
    const X_SCOUPY_USER = '63ea4985hyp5s1x95oo546ia5v93ej9mxeg3tfpkvj';

    /**
     * header: The language that is used for certain responses.
     * @var string
     */
    const X_SCOUPY_LANG = 'en';

    /**
     * header: The currently used region.
     * @var string
     */
    const X_SCOUPY_REGION = 'nl';

    /**
     * header: Flag to enable testing-mode (default is no).
     * @var string
     */
    const X_SCOUPY_TESTING = 'no';

    /**
     * URL List
     * @var string
     */
    const URL_LIST = 'https://api2.scoupy.nl/v10/coupon/list';

    /**
     * URL Hide
     * @var string
     */
    const URL_HIDE = 'https://api2.scoupy.nl/v1/coupon/hide';

    /**
     * URL Unhide
     * @var string
     */
    const URL_UNHIDE = 'https://api2.scoupy.nl/v1/coupon/unhide';

    /**
     * Parameters: Type of the coupon list
     * @var string
     */
    const TYPE = 'cashback';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;
}
