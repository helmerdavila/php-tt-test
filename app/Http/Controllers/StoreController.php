<?php

namespace App\Http\Controllers;

use App\Models\ElectronicItem;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $electronicItems = ElectronicItem::forSale()->get();

        return view('store.index', compact('electronicItems'));
    }
}
