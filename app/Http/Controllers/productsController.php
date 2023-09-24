<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = product::with('categorie')->orderByDesc('id')->paginate(10);
        return view('viewAdmain.products.AllProducts' ,compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = product::all();
        $caregories = categorie::all();

        return view('viewAdmain.products.Addproducts',compact('products','caregories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'image'=>['required','file'],
            'content'=>'required',
            'price'=>'required',
            'sale_price'=>'nullable',
            'quantity'=>'required',
            'categoriey_id'=>['nullable','exists:categories,id'],
        ]);
        $image_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('Uplodesproducts'),$image_name);
        product::create([
            'name'=>$request->name,
            'image'=>$image_name,
            'content'=>$request->content,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'quantity'=>$request->quantity,
            'categoriey_id'=>$request->categoriey_id,
        ]);
     return redirect()->route('Admin.products.index')->with('masg','products Add successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products=product::findOrFail($id);
        $product=product::select('id','name')->get();
        $caregoriey=categorie::select('id','name')->whereNull('parent_id')->where('id','!=',$products->id)->get();

        return view('viewAdmain.products.editProducts',compact('products','product','caregoriey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products=product::findOrFail($id);
        $image_name=$products->image;
        if($request->hasFile('image')){
         File::delete(public_path('Uplodesproducts/'.$products->image));
         $image_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('Uplodesproducts'),$image_name);}
        $products->update([
            'name'=>$request->name,
            'image'=>$image_name,
            'content'=>$request->content,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'quantity'=>$request->quantity,
            'categoriey_id'=>$request->categoriey_id,

        ]);
     return   redirect()->route('Admin.products.index')->with('masg','products update successful');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $products=product::findOrFail($id);
        // File::delete(public_path('Uplodesproducts/'.$products->image));
        $products->delete();
        return redirect()->back();
    }
    function trash() {
        $products = product::onlyTrashed()->orderByDesc('id')->paginate(10);
        return view('viewAdmain.products.trash',compact('products'));

    }
    function restor($id){
        // $products = product::onlyTrashed()->find($id)->update(['deleted_at'=>null]);
         product::onlyTrashed()->find($id)->restore();

        return redirect()->route('Admin.products.index')->with('masg','products restor successful');

    }
   public function forcedelete($id){
        // $products = product::onlyTrashed()->delete($id)->(['deleted_at'=>null]);
        $products= product::onlyTrashed()->find($id);
         File::delete(public_path('Uplodesproducts/'.$products->image));
         product::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('masg','products delete successful');

    }
}
