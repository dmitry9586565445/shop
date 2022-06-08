<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::latest()->get();

        return view('auth.order.index', compact('orders'));
    }
}
