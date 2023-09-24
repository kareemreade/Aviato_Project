@extends('viewSite1.master')
@section('title','cart | '.env('APP_NAME'))
@section('contien')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="{{ route('site1.home') }}">Home</a></li>
						<li class="active">cart</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
                @if (session('masg'))
                <div class="row mt-30">
                    <div class="col-xs-12">
                        <div class="alertPart">
                            <div id="successMessage" class="alert alert-success alert-common" role="alert"><i class="tf-ion-thumbsup"></i><span>Well done! </span> You product Rimove From the cart </div>
                        </div>
                    </div>
                </div>
                @endif
                <script>
                    // انتظر 5 ثواني ثم اخفي الرسالة
                    setTimeout(function() {
                        var successMessage = document.getElementById("successMessage");
                        successMessage.style.display = "none";
                    }, 5000); // 5000 ميلي ثانية = 5 ثواني

                </script>
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">quantity & Item Price</th>
                      <th class="">Total Price </th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @auth
                    @foreach ($carts as $cart)
                    <tr class="">
                        <td class="">
                          <div class="product-info">
                            <img width="100" height="70" src="{{ asset('uplodesProducts/'.$cart->product->image) }}" alt="" />
                            <a href="#!">{{ $cart->product->name }}</a>
                          </div>
                        </td>
                        <td style="text-align: center"><span>{{$cart->quantity }} x</span>
                            <span>$ {{$cart->price }}</span></td>

                        <td class="">${{$cart->quantity
                        *
                        $cart->price}}</td>
                        <td class="">
                          <form action="{{ route('site1.destroy',$cart->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button style="background-color:white; border: none" class="product-remove">Rimove</button>
                        </form>
                    </div>
                    </td>
                        </td>
                      </tr>
                          @php
                          $total +=
                          $cart->quantity *
                          $cart->price
                       @endphp
                      @endforeach
                      @endauth


                  </tbody>
                </table>
                <hr>
                <div class="cart-summary">
                    <span>Total : </span>
                    <span class="total-price">${{ $total }}</span>
                </div>
                <br>
                <br>
                <a href="{{ route('site1.Checkout') }}" class="btn btn-main pull-right">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

