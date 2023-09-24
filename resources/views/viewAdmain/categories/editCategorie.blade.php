@extends('viewAdmain.master')
@section('titile','editCategorie |' . env('APP_NAME'))
@section('contien')
<h1>Edit Categories</h1>
<div class="page-wrapper p-4 ">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
              <div class="product-list">
                <form action="{{ route('Admin.Caregorys.update',$caregories->id) }}" method="POST" enctype="multipart/form-data" class="checkout-form" >
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4 " style="padding-right:200px">
                       <label for="full_name">Name</label>
                       <input type="text" class="form-control" name="name" id="full_name" placeholder="Enter_name" value="{{$caregories->name }}">
                    </div>
                    <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="Image">Image</label>
                        <input style="padding-right:100px" type="file" class="form-control" name="image" id="Image" placeholder="uplodes image">
                            <br>
                        <img width="120" src="{{asset('uplodesCategories/'.$caregories->image) }}" alt="" />
                     </div>
                     <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="Parent_id">Parent</label>
                        <select name="parent_id" id="parent_id" class="form-control ">
                          <option value="">Select</option>
                          @foreach ($caregoriey as $categorie)
                          <option {{$caregories->parent_id == $categorie->id ? 'selected':' '}} value="{{$categorie->id}}">{{$categorie->name}}</option>
                          @endforeach
                        </select>

                     </div>
                     <button type="submit" class="btn btn-dark mt-3 px-5 ">update</button>

@endsection


