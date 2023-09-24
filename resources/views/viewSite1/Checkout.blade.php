@extends('viewSite1.master')
@section('title','Checkout | '.env('APP_NAME'))
@section('contien')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="{{ route('site1.home') }}">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <div class="block billing-details">
                <br>
                <br>
                @if($total == 0)

                <div class="alert alert-info alert-common" role="alert"><i class="tf-ion-android-checkbox-outline"></i><span>Warning!</span> Before paying, please shop and choose the products you want</div>

                @else
                <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $id }}"></script>

                <form action="{{ route('site1.payment') }}" class="paymentWidgets" data-brands="VISA MASTER AMEX SADAD_VA MADA"></form>

                @endif
               </div>
            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Order Summary</h4>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($carts as $cart )
                        <div class="media product-card">
                            <a class="pull-left" href="product-single.html">
                               <img class="media-object" src="{{ asset('uplodesProducts/'.$cart->product->image) }}" alt="Image" />
                            </a>
                            <div class="media-body">
                               <h4 class="media-heading"><a href="product-single.html">Ambassador Heritage 1921</a></h4>
                               <p class="price">{{$cart->quantity  }} x    ${{ $cart->price }}</p>
                               <form action="{{ route('site1.destroy',$cart->id) }}" method="post" style="margin-top:-34px;margin-left: 80px;">
                                @csrf
                                @method('delete')
                                <button style="background-color:white; border: none;color: rgb(236, 118, 118);" class="product-remove">Rimove</button>
                            </form>
                            </div>
                            <hr>
                         </div>
                         @php
                         $total += $cart->quantity * $cart->price;
                        @endphp
                        @endforeach
                     <div class="discount-code">
                        <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
                     </div>
                     <ul class="summary-prices">
                        <li>
                           <span>Subtotal:</span>
                           <span class="price">$190</span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Total</span>
                        <span>${{ $total }}</span>
                     </div>
                     <div class="verified-icon">
                        <img src="{{ asset('site1asset/images/shop/verified.png') }}">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
