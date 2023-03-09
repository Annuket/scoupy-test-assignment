<?php

namespace App\Models;

use App\Config;

class Coupon extends \Core\Model
{
    /**
     * Get all the coupons as an associative array
     */
    public static function getAll()
    {
        $ch = static::getCh();

        $endpoint = Config::URL_LIST;
        $params = array(
            'type' => Config::TYPE,
        );
        $url = $endpoint . '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $list = array();

        if ($http_status == 200) {

            $data = json_decode($response, true);

            if (isset($data["list"])) {
                $list = array_filter($data["list"], function ($v, $k) {
                    return $v["coupon_type"] == Config::TYPE;
                }, ARRAY_FILTER_USE_BOTH);
            }
        }

        return $list;
    }

    /**
     * Get hidden coupons as an associative array
     */
    public static function getHidden()
    {
        $ch = static::getCh();

        $endpoint = Config::URL_LIST;
        $params = array(
            'type' => Config::TYPE,
            'hidden' => 'yes'
        );
        $url = $endpoint . '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $list = array();

        if ($http_status == 200) {

            $data = json_decode($response, true);

            if (isset($data["list"])) {
                $list = array_filter($data["list"], function ($v, $k) {
                    return $v["coupon_type"] == Config::TYPE;
                }, ARRAY_FILTER_USE_BOTH);
            }
        }

        return $list;
    }

    /**
     * Hide coupons list
     */
    public static function hide($coupons_ids)
    {
        $ch = static::getCh();

        curl_setopt($ch, CURLOPT_URL, Config::URL_HIDE);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            http_build_query(array('coupon_ids' => $coupons_ids))
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($http_status == 200);
    }

    /**
     * Unhide coupons list
     */
    public static function unhide($coupons_ids)
    {
        $ch = static::getCh();

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, Config::URL_UNHIDE);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            http_build_query(array('coupon_ids' => $coupons_ids))
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($http_status == 200);
    }
}
