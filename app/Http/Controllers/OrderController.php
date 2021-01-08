<?php

namespace App\Http\Controllers;

use App\Instances\Cart;
use App\Models\ElectronicItem;

class OrderController extends Controller
{
    public function add(int $electronicItemId)
    {
        $cart = Cart::instance();

        $electronicItem = ElectronicItem::find($electronicItemId);

        $cart->add($electronicItem);

        return back();
    }

    public function remove(int $electronicItemId)
    {
        $cart = Cart::instance();

        $electronicItem = ElectronicItem::find($electronicItemId);

        $cart->remove($electronicItem);

        return back();
    }
}
