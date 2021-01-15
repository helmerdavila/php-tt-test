<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ProfileController extends Controller
{
    public function index()
    {
        $orders = Order::whereUserId(auth()->id())->with('order_details.electronic_item')->orderByDesc('id')->get();

        return view('profile.index', compact('orders'));
    }
}
