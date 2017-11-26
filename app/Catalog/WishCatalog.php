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

    private $Wishlist;

    /**
     * @return mixed
     */
    public function getWishlist()
    {
        return $this->Wishlist;
    }

    /**
     * @param mixed $Wishlist
     */
    public function setWishlist($Wishlist)
    {
        $this->Wishlist = $Wishlist;
    }


    public function __construct() {

        $this->setWishList(new WishList());
    }

    public function createWish($electronics,$user)
    {
        $wishlist = new WishList();
        $wishlist->setUser($user);
        $wishlist->setElectronics($electronics);
        $wishlist->setWishId($_SESSION['WishIdAddInternalCounter']);
        $_SESSION['WishIdAddInternalCounter']=$_SESSION['WishIdAddInternalCounter']+1;
        return $wishlist;
    }


}