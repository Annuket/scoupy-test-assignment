<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Coupon;

class Coupons extends \Core\Controller
{
    /**
     * Show the list of coupons
     */
    public function listAction()
    {
        $coupons = Coupon::getAll();
        View::renderTemplate('Coupons/list.html', [
            'coupons' => $coupons
        ]);
    }

    /**
     * Hide coupon
     */
    public function hideAction()
    {
        $id = (int)$this->route_params['id'];
        $coupons_ids = [$id,];

        if (Coupon::hide($coupons_ids)) {

            self::redirect('/coupons/list');
        } else {

            throw new \ErrorException('An error occurred');
        }
    }

    /**
     * Show the list of hidden coupons
     */
    public function hiddenAction()
    {
        $coupons = Coupon::getHidden();
        View::renderTemplate('Coupons/hidden.html', [
            'coupons' => $coupons
        ]);
    }

    /**
     * Unhide coupon
     */
    public function unhideAction()
    {
        $id = (int)$this->route_params['id'];
        $coupons_ids = [$id,];

        if (Coupon::unhide($coupons_ids)) {

            self::redirect('/coupons/hidden');
        } else {

            throw new \ErrorException('An error occurred');
        }
    }
}
