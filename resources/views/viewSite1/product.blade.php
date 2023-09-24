@extends('viewSite1.master')
@section('title')
{{$products->name }} categorys
@endsection
@section('styles1')
<style>
                    .card {
                background-color: #fff;
                border-radius: 10px;
                padding: 5px;
                width: 330px;
                display: flex;
                flex-direction: column;
                }

                .form {
                margin-top: 5px;
                display: flex;
                flex-direction: column;
                }

                .group {
                position: relative;
                }

                .form .group label {
                font-size: 14px;
                color: rgb(99, 102, 102);
                position: absolute;
                top: -10px;
                left: 10px;
                background-color: #fff;
                transition: all .3s ease;
                }

                .form .group input,
                .form .group textarea {
                padding: 10px;
                border-radius: 5px;
                border: 1px solid rgba(0, 0, 0, 0.2);
                margin-bottom: 20px;
                outline: 0;
                width: 300%;
                background-color: transparent;
                }

                .form .group input:placeholder-shown+ label, .form .group textarea:placeholder-shown +label {
                top: 10px;
                background-color: transparent;
                }

                .form .group input:focus,
                .form .group textarea:focus {
                border-color: #000000;
                }

                .form .group input:focus+ label, .form .group textarea:focus +label {
                top: -10px;
                left: 10px;
                background-color: #fff;
                color: #000000;
                font-weight: 600;
                font-size: 14px;
                }

                .form .group textarea {
                resize: none;
                height: 90px;
                }

                .form button {
                background-color: #F9F9F9;
                color: rgb(0, 0, 0);
                border: none;
                border-radius: 8px;
                padding:10px;
                padding-left:20px;
                font-size: 16px;
                cursor: pointer;
                transition: all 0.3s ease;
                margin-left: 620px;
                }

                .form button:hover {
                background-color: #000000;
                color: rgb(255, 255, 255);

                }


</style>
@endsection

@section('contien')
<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="{{ route('site1.home') }}">Home</a></li>
					<li><a href="{{ route('site1.Shop') }}">Shop</a></li>
					<li> <a href="{{ route('site1.product',$products->id) }}">{{ $products->name }}</a></li>
				</ol>
			</div>
            <div class="col-md-6">
				<ol class="product-pagination text-right">
                    @if ($next)
					<li><a href="{{route('site1.product',$next->id) }}"><i class="tf-ion-ios-arrow-left"></i> Next </a></li>
                    @endif
                    @if ($Previews)
					<li><a href="{{ route('site1.product',$Previews->id) }}">Preview <i class="tf-ion-ios-arrow-right"></i></a></li>

                    @endif
				</ol>
			</div>
		</div>

		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src='{{ asset('uplodesProducts/'.$products->image) }}' alt='' data-zoom-image="{{ asset('uplodesProducts/'.$products->image) }}" />
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
			<div class="col-md-7">
                @if (session('masg'))
                <div class="row mt-30">
                    <div class="col-xs-12">
                        <div class="alertPart">
                            <div id="successMessage" class="alert alert-success alert-common" role="alert"><i class="tf-ion-thumbsup"></i><span>Well done! </span> You product add to cart </div>
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
				<div class="single-product-details">
					<h2>{{ $products->name }}</h2>
                    @if ($products->sale_price)
                    <del>Base price : {{ $products->price }} $</del>
                    <p class="price">The price after discount : {{ $products->sale_price }} $</p>
                    @else
                    <p class="price">The price : {{ $products->price }} $</p>
                    @endif
					<p class="product-description mt-20">
						{{Str::words($products->content, 15, '..........') }}
					</p>
					{{-- <div class="color-swatches">
						<span>color:</span>
						<ul>
							<li>
								<a href="#!" class="swatch-violet"></a>
							</li>
							<li>
								<a href="#!" class="swatch-black"></a>
							</li>
							<li>
								<a href="#!" class="swatch-cream"></a>
							</li>
						</ul>
					</div>
					<div class="product-size">
						<span>Size:</span>
						<select class="form-control">
							<option>S</option>
							<option>M</option>
							<option>L</option>
							<option>XL</option>
						</select>
					</div> --}}
                    <div class="product-category">
						<span>Categories:</span>
                        <ol class="breadcrumb" style="margin-top: -28px;margin-left:80px">
							<li><a href="{{ route('site1.category',$products->id) }}">{{$products->categorie->name}}</a></li>
							<li><a href="{{ route('site1.product',$products->id) }}">{{$products->name }}</a></li>
                        </ol>
					</div>
					<div class="quantity">
						<span style="margin-top: -68px">Quantity:</span>
                            <form class="quantity-slider"  action="{{ route('site1.carts',$products->id) }}" method="post" >
                                @csrf
                                <input id="quantity" type="text" name="quantity" value="1">
                                <button class="btn btn-main mt-20" style="margin-left:-102px" type="submit">Add To Cart</button>
                            </form>
					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
						<li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews ({{ count($rev) }})</a></li>
					</ul>
					<div class="tab-content patternbg">
						<div id="details" class="tab-pane fade active in">
							<h4>Product Description</h4>
							<p>{{ $products->content }}</p>
						</div>
						<div id="reviews" class="tab-pane fade">
							<div class="post-comments">
						    	<ul class="media-list comments-list m-bot-50 clearlist">
								    <!-- Comment Item start-->
                                    @if (count($rev) == 0)
                                    <p style="text-align: center; background-color: rgb(179, 176, 176);color: #000000">
                                        There is no comment
                                    </p>
                                    @endif
                                    @foreach ($rev as $review )
                                    <li class="media">

								        <a class="pull-left" href="#!">
								            <img class="media-object comment-avatar" src="https://ui-avatars.com/api/?name={{$review->user->First_name}}  {{$review->user->last_name}}" alt="" width="50" height="50" />
								        </a>

								        <div class="media-body">
								            <div class="comment-info">
								                <h4 class="comment-author">
								                    <a href="#!">{{$review->user->First_name }} {{ $review->user->last_name  }}</a>

								                </h4>
								                <time datetime="2013-04-06T13:53">{{ $review->created_at->format('F d ,Y,') }} at {{ $review->created_at->format('h:i') }}</time>
								            </div>
								            <p>
								                {{$review->comment}}
								            </p>
								        </div>

								    </li>
                                    <hr>
                                    @endforeach
								    <!-- End Comment Item -->
							</ul>
                            <div class="card">
                                <form class="form" action="{{ route('site1.reviews',$products->id) }}" method="post">
                                    @csrf
                              <div class="group">
                                  <textarea placeholder="" id="comment" name="comment" rows="50" required=""></textarea>
                                  <label for="comment">Leave a comment</label>
                              </div>
                              <div style=" margin-left:350px; margin-top:-100px">
                                <button type="submit">Send </button>
                              </div>

                                </form>
                              </div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="products related-products section">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Related Products</h2>
			</div>
		</div>
		<div class="row">
            @foreach ($sameprodect as $product )
            <div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">
                        @if ($product->sale_price)
						<span class="bage">Sale</span>
                        @endif
						<img class="img-responsive" src="{{ asset('uplodesproducts/'.$product->image) }}" alt="product-img" />
					</div>
					<div class="product-content">
						<h4><a href="{{ route('site1.product',$product->id) }}">{{ $product->name }}</a></h4>
                        @if ($product->sale_price)
                        <del>Base price : {{ $product->price }} $</del>
                        <p class="price">The price after discount : {{ $product->sale_price }} $</p>
                        @else
                        <p class="price">The price : {{ $product->price }} $</p>
                        @endif
					</div>
				</div>
			</div>
            @endforeach


	</div>

</section>

@endsection
