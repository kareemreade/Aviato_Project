<?php

namespace App\Http\Controllers;

use App\Mail\aviatoMail;
use Exception;
use App\Models\cart;
use App\Models\order;
use App\Models\review;
use App\Models\payment;
use App\Models\product;
use Nette\Utils\Floats;
use App\Models\categorie;
use App\Models\order_item;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Cast\Double;

class siteController extends Controller
{
    public function index(){
        $homes= product::orderByDesc('id')->limit(3)->get();
        $categorys= categorie::orderByDesc('id')->limit(2)->get();
        $prodects= product::orderByDesc('id')->limit(9)->offset(3)->get();



        return view('viewSite1.home',compact('homes','categorys','prodects'));
    }
    public function Shop() {
        $prodects= product::orderByDesc('id')->paginate(9);
        return view('viewSite1.shop',compact('prodects'));
    }
    public function category($id) {
        $categorys= categorie::with('products')->find($id);
        return view('viewSite1.categorys',compact('categorys'));
    }
    public function product($id) {
        $products= product::with('categorie')->find($id);
        $next=product::where('id','>',$products->id)->first();
        $Previews=product::where('id','<',$products->id)->orderByDesc('id')->first();
        $rev=review::with('user','product')->where('product_id','=',$products->id)->get();
        $sameprodect= product::where('categoriey_id','=',$products->categorie->id)->get();
        return view('viewSite1.product',compact('products','next','Previews','rev','sameprodect'));

    }
    public function Search(Request $request) {
        $products= product::where('name','like','%'.request()->search.'%')->paginate(9);
        return view('viewSite1.search',compact('products'));
    }
    public function reviews(Request $request ,$id) {
        $prodects=$id;
        $users= Auth::user()->id;
        review::create([
        'comment'=>$request->comment,
        'star'=>5,
        'local'=>'ar',
        'user_id'=>$users,
        'product_id'=>$prodects
        ]);
        return redirect()->back();
    }
    public function carts(Request $request ,$id) {
        $prodects= product::find($id);
        $prodects_id=$id;
        if($prodects->sale_price){
        $price=$prodects->sale_price;
       }else{
        $price=$prodects->price;
        }
        $carts=cart::where('product_id','=',$id)->where('user_id','=',Auth::id())->first();
        if($carts){
            $carts->update([
                'quantity' => ($carts->quantity + $request->quantity)
            ]);
        } else {
        cart::create([
            'price'=>$price,
            'quantity'=>$request->quantity,
            'user_id'=>Auth::id(),
            'product_id'=>$prodects_id,
            ]);
        }
        return redirect()->back()->with('masg','product add to cart');
}
    public function showcart(){
        $carts=cart::all();
        return view('viewSite1.cart',compact('carts'));
    }
    public function Checkout(){
        $carts= cart::all();
        $total =(int) Auth::user()->cart()->sum(DB::raw('quantity  * price '));
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=$total" .
                    "&currency=USD" .
                    "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData ,true );
        $id = $responseData['id'];
        return view('viewSite1.Checkout',compact('carts','id','total'));
    }
    public function payment(Request $request){
        $resourcePath = $request->resourcePath;
        $url = "https://eu-test.oppwa.com$resourcePath";
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
        return curl_error($ch);
        }
        curl_close($ch);
         $responseData = json_decode($responseData,true);
         $code = $responseData['result']['code'];
         $totals = $responseData['amount'];
         $transaction_id = $responseData['id'];
        if ($code == '000.100.110'){
            DB::beginTransaction();
            try{
                //create new order
                $orders =  order::create([
                    'total'=>$totals,
                    'user_id'=>Auth::user()->id,
                ]);
                //add cart to order items
                foreach(Auth::user()->cart as $cart){
                    order_item::create([
                    'price'=>$cart->price,
                    'quantity'=>$cart->quantity,
                    'user_id'=>$cart->user_id,
                    'product_id'=>$cart->product_id,
                    'order_id'=>$orders->id,
                    ]);
                    product::find($cart->product_id)->decrement('quantity',$cart->quantity);
                    $cart->delete();
                    //decrement quantity
                    // delete cart
                }
                payment::create([
                    'total'=> $totals,
                    'user_id'=> Auth::id(),
                    'order_id'=> $orders->id,
                    'transaction_id'=>$transaction_id,
                ]);
                DB::commit();
              }catch(Exception $e){
                DB::rollBack();
                throw new Exception ($e->getMessage());
            }
            return redirect()->route('site1.paysuccessful');

        }else{
            return redirect()->route('site1.payErros');

        }

        }

    public function destroy(string $id)
    {
            $cart = cart::find($id);
            $cart->delete();
            return redirect()->back()->with('masg','product delete to cart');
        }
        public function paysuccessful()
        {
            return view('viewSite1.successful');
        }

        public function payErros()
        {
            return view('viewSite1.Errors');

         }
         public  function sendemil(Request $request)
         {
            $email=$request->email;
            $data= $request->except('_token');
            Mail::to('kareem1772002@gmail.com')->send(new aviatoMail($data));
            return redirect()->back()->with('masg','send email succful');
         }

}

