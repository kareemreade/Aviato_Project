@extends('viewAdmain.master')
@section('titile','Addproducts|' . env('APP_NAME'))
@section('contien')
<h1>Add new Prodects</h1>
<div class="page-wrapper p-4 ">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
              <div class="product-list">
                <form action="{{ route('Admin.products.store') }}" method="POST" enctype="multipart/form-data" class="checkout-form" >
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
                        <label for="Parent_id">category</label>
                        <select name="categoriey_id" id="categoriey_id" class="form-control @error('categoriey_id') is-invalid @enderror">
                            @error('categoriey_id')
                            <strong class="valid-feedback">
                             {{$message}}
                            </strong>

                            @enderror
                          <option value="">Select</option>
                              @foreach ($caregories as $items)
                              <option value="{{$items->id }}">{{$items->name}}</option>
                              @endforeach

                        </select>

                     </div>
                     <div class="mb-3" style="padding-right:200px">
                        <label for="exampleFormControlTextarea1" class="form-label @error('content') is-invalid
                        @enderror">content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                        @error('content')
                        <strong class=" valid-feedback">
                            {{ $message }}
                        </strong>
                        @enderror
                      </div>

                     <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="price">price</label>
                        <input type="text" class="form-control @error('price') is-invalid
                        @enderror " name="price" id="price" placeholder="Enter_price">
                        @error('price')
                        <strong class="valid-feedback">
                         {{$message}}
                        </strong>

                        @enderror
                     </div>
                     <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="sale_price">sale_price</label>
                        <input type="text" class="form-control @error('sale_price') is-invalid
                        @enderror " name="sale_price" id="sale_price" placeholder="Enter_sale_price">
                        @error('sale_price')
                        <strong class="valid-feedback">
                         {{$message}}
                        </strong>

                        @enderror
                     </div>
                     <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="quantity">quantity</label>
                        <input type="text" class="form-control @error('quantity') is-invalid
                        @enderror " name="quantity" id="quantity" placeholder="Enter_quantity">
                        @error('quantity')
                        <strong class="valid-feedback">
                         {{$message}}
                        </strong>

                        @enderror
                     </div>

                     <button type="submit" class="btn btn-dark mt-3 px-5 ">Add</button>

@endsection
