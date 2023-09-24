<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CaregorysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $caregories = Categorie::with('parent','products')->orderByDesc('id')->paginate(10);
        return view('viewAdmain.categories.AllCategories' ,compact('caregories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caregories = categorie::all()->whereNull('parent_id');
        return view('viewAdmain.categories.AddCategories',compact('caregories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'image'=>['required','file'],
            'parent_id'=>['nullable','exists:categories,id'],
        ]);
        $image_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('UplodesCategories'),$image_name);
        categorie::create([
            'name'=>$request->name,
            'image'=>$image_name,
            'parent_id'=>$request->parent_id,
        ]);
     return   redirect()->route('Admin.Caregorys.index')->with('masg','Caregorys Add successful');
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
        $caregories=categorie::findOrFail($id);
        $caregoriey=categorie::select('id','name')->whereNull('parent_id')->where('id','!=',$caregories->id)->get();
        return view('viewAdmain.categories.editCategorie',compact('caregories','caregoriey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $caregories=categorie::findOrFail($id);
        $image_name=$caregories->image;
        if($request->hasFile('image')){
        File::delete(public_path('UplodesCategories/'.$caregories->image));
        $image_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('UplodesCategories'),$image_name);}
        $caregories->update([
            'name'=>$request->name,
            'image'=>$image_name,
            'parent_id'=>$request->parent_id,
        ]);
     return   redirect()->route('Admin.Caregorys.index')->with('masg','Caregorys update successful');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $caregories=categorie::findOrFail($id);
        $caregories->childrn()->update(['parent_id'=> null]);
        $caregories->delete();
        return redirect()->back();
    }
    function trash() {
        $caregories = Categorie::onlyTrashed()->orderByDesc('id')->paginate(10);
        return view('viewAdmain.categories.trash',compact('caregories'));

    }
    function restor($id){
        // $caregories = categorie::onlyTrashed()->find($id)->update(['deleted_at'=>null]);
         categorie::onlyTrashed()->find($id)->restore();

        return redirect()->route('Admin.Caregorys.index')->with('masg','Caregorys restor successful');

    }
   public function forcedelete($id){
        // $caregories = categorie::onlyTrashed()->delete($id)->(['deleted_at'=>null]);
        $caregories= categorie::onlyTrashed()->find($id);
        File::delete(public_path('UplodesCategories/'.$caregories->image));

         categorie::onlyTrashed()->find($id)->forcedelete();

        return redirect()->back()->with('masg','Caregorys delete successful');

    }
}
