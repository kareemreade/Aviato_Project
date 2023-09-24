@extends('viewAdmain.master')
@section('titile','AddCategories |' . env('APP_NAME'))
@section('contien')
<h1>Add new Categories</h1>
<div class="page-wrapper p-4 ">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
              <div class="product-list">
                <form action="{{ route('Admin.Caregorys.store') }}" method="POST" enctype="multipart/form-data" class="checkout-form" >
                    @csrf
                    <div class="form-group mb-4 " style="padding-right:200px">
                       <label for="full_name">Name</label>
                       <input type="text" class="form-control @error('name') is-invalid
                       @enderror " name="name" id="full_name" placeholder="Enter_name">
                       @error('name')
                       <strong class="valid-feedback">
                        {{$message}}
                       </strong>

                       @enderror
                    </div>
                    <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="Image">Image</label>
                        <input style="padding-right:100px" type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="Image" placeholder="uplodes image">
                        @error('image')
                        <strong class="valid-feedback">
                         {{$message}}
                        </strong>

                        @enderror
                     </div>
                     <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="Parent_id">Parent</label>
                        <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                            @error('parent_id')
                            <strong class="valid-feedback">
                             {{$message}}
                            </strong>

                            @enderror
                          <option value="">Select</option>
                              @foreach ($caregories as $categorie)
                              <option value="{{$categorie->id }}">{{$categorie->name}}</option>
                              @endforeach

                        </select>

                     </div>
                     <button type="submit" class="btn btn-dark mt-3 px-5 ">Add</button>

@endsection
