<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 11/16/2017
 * Time: 8:03 PM
 */

namespace App\Catalog;
use App\Model\WishList;

use App\TDG\WishTDG;

class WishCatalog
{

    private $WishListTDG;

    /**
     * @return mixed
     */
    public function getWishListTDG()
    {
        return $this->WishListTDG;
    }

    /**
     * @param mixed $WishListTDG
     */
    public function setWishListTDG($WishListTDG)
    {
        $this->WishListTDG = $WishListTDG;
    }

    /**
     * @return mixed
     */

    public function __construct() {
        $WishListTDG = new WishTDG();
        $this->setWishListTDG($WishListTDG);
    }


}