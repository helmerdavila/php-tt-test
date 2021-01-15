<?php

namespace App\Http\Controllers;

use App\Instances\Cart;
use App\Models\ElectronicItem;
use App\Models\Order;
use App\Models\OrderDetail;

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

    public function preview()
    {
        $cart = Cart::instance();

        return view('order.preview', compact('cart'));
    }

    public function create()
    {
        $cart = Cart::instance();
        $order = new Order;

        $order->user_id = auth()->user()->id;
        $order->total = $cart->total();
        $order->save();

        $content = $cart->content();

        $content->each(function ($electronicItem) use ($order) {
            /** @var ElectronicItem $electronicItem */
            $orderDetail = new OrderDetail;
            $orderDetail->order()->associate($order);
            $orderDetail->electronic_item_id = $electronicItem['id'];
            $orderDetail->save();
        });

        $cart->clean();

        return redirect()->route('profile.index');
    }
}
