<?php

namespace Core;

use App\Config;

abstract class Model
{

    /**
     * Init CUrl
     */
    protected static function getCh()
    {
        $headers = [
            'X-SCOUPY-KEY: ' . Config::X_SCOUPY_KEY,
            'X-SCOUPY-VERSION: ' . Config::X_SCOUPY_VERSION,
            'X-SCOUPY-USER: ' . Config::X_SCOUPY_USER,
            'X-SCOUPY-LANG: ' . Config::X_SCOUPY_LANG,
            'X-SCOUPY-REGION: ' . Config::X_SCOUPY_REGION,
            'X-SCOUPY-TESTING: ' . Config::X_SCOUPY_TESTING
        ];

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true
        ]);

        return $ch;
    }
}
