@extends('viewAdmain.master')
@section('titile','editCategorie |' . env('APP_NAME'))
@section('contien')
<h1>Edit Prodects</h1>
<div class="page-wrapper p-4 ">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
              <div class="product-list">
                <form action="{{ route('Admin.products.update',$products->id) }}" method="POST" enctype="multipart/form-data" class="checkout-form" >
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4 " style="padding-right:200px">
                       <label for="full_name">Name</label>
                       <input type="text" class="form-control" name="name" id="full_name" placeholder="Enter_name" value="{{$products->name }}">
                    </div>
                    <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="Image">Image</label>
                        <input style="padding-right:100px" type="file" class="form-control" name="image" id="Image" placeholder="uplodes image">
                            <br>
                        <img width="120" src="{{asset('uplodesproducts/'.$products->image) }}" alt="" />
                     </div>
                     <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="categoriey_id">category</label>
                        <select name="categoriey_id" id="categoriey_id" class="form-control ">
                          <option value="">Select</option>
                          @foreach ($caregoriey as $items)
                          <option {{$products->categoriey_id == $items->id ? 'selected':' '}} value="{{$items->id}}">{{$items->name}}</option>
                          @endforeach
                        </select>

                     </div>
                     <div class="mb-3" style="padding-right:200px">
                        <label for="exampleFormControlTextarea1" class="form-label">content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{{ $products->content }}</textarea>
                      </div>

                     <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="price">price</label>
                        <input type="number" class="form-control " name="price" id="price" placeholder="Enter_price" value="{{ $products->price }}" >
                     </div>
                     <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="sale_price">sale_price</label>
                        <input type="text" class="form-control" name="sale_price" id="sale_price" placeholder="Enter_sale_price" value="{{ $products->sale_price }}" >
                     </div>
                     <div class="form-group mb-4 " style="padding-right:200px">
                        <label for="quantity">quantity</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter_quantity" value="{{ $products->quantity }}" >
                     </div>

                     <button type="submit" class="btn btn-dark mt-3 px-5 ">update</button>

@endsection


