<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 11/16/2017
 * Time: 8:03 PM
 */

namespace App\Catalog;
use App\Model\ElectronicSpecification;
use App\Model\WishList;

use App\TDG\WishTDG;

class WishCatalog
{

    private $Wishlist;

    private $wishListArray = [];

    /**
     * @return array
     */
    public function getWishListArray(): array
    {
        return $this->wishListArray;
    }

    /**
     * @param array $wishListArray
     */
    public function setWishListArray(array $wishListArray)
    {
        $this->wishListArray = $wishListArray;
    }




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

    public function getAllWish($ret) {


        while($row = pg_fetch_assoc($ret)) {

        $wish = new WishList();
        $es = new ElectronicSpecification();

            $wish->setWishId($row['wish_id']);
            $es->setElectronicsId($row['electronics_id']);
            $es->setBrandName($row['brand']);
            $es->setPrice($row['price']);
            $es->setType($row['type']);
            $wish->setElectronics($es);
            $wish->setUser($row['user_id']);
            $this->wishListArray[$row['wish_id']] = $wish;
        }

        return $this->getWishListArray();
    }
}