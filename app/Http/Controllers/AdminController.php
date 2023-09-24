<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\review;
use App\Models\payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('viewAdmain.master');

}
public function reviews() {
    $reviews = review::all();
    return view('viewAdmain.Allreviews',compact('reviews'));

}
public function destory(string $id)
    {

        $reviews=review::find($id);
        $reviews->delete();
        return redirect()->back();
    }


    public function orders() {
        $orders = order::all();
        return view('viewAdmain.Allorders',compact('orders'));

    }
    function order_destory($id) {
        $orders = order::find($id);
        $orders -> delete ();
        return redirect()->back();
    }
    function payments() {
        $payments = payment::all();
        return view('viewAdmain.Allpayments',compact('payments'));
    }
    function payments_destory($id) {
        $payments = payment::find($id);
        $payments -> delete ();
        return redirect()->back();
    }


}
