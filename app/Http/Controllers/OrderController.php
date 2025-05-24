<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getCustomerOrders(Customer $customer)
    {

        $orders = $customer->orders()->get();
        return response()->json($orders);
    }

    public function getOrderDetails(Order $order)
    {
        return view('orders._order_details', compact('order'));
    }
}
