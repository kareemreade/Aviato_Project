@extends('viewSite1.master')
@section('title','Home | ' .env('APP_NAME'))
@section('contien')

<div class="hero-slider">
    @foreach ($homes as $home )
    <div class="slider-item th-fullpage hero-area" style="background-image: url({{ asset('uplodesproducts/'.$home->image) }});">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 text-center">
              <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1"> {{ $home->name }}</p>
              <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{ Str::words( $home->content, 10, '...')  }}.</h1>
              <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{ route('site1.product',$home->id) }}">Shop Now</a>
            </div>
          </div>
        </div>
      </div>

    @endforeach

  </div>

  <section class="product-category section">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="title text-center">
                      <h2>Product Category</h2>
                  </div>
              </div>
                @foreach ($categorys as $category )
                <div class="col-md-6">
                    <div class="category-box ">
                        <a href="{{ route('site1.category',$category->id) }}">
                            <img src="{{ asset('uplodesCategories/'.$category->image) }}" alt="" />
                            <div class="content">
                                <h3>{{ $category->name }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
          </div>
      </div>
  </section>

  <section class="products section bg-gray">
      <div class="container">
          <div class="row">
              <div class="title text-center">
                  <h2>Trendy Products</h2>
              </div>
          </div>
          <div class="row">
             @foreach ($prodects as $prodect )
             <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        @if ($prodect->sale_price)
                        <span class="bage">Discount</span>
                        @endif
                        <img class="img-responsive" src="{{ asset('uplodesProducts/'.$prodect->image) }}" alt="product-img" />
                    </div>
                    <div class="product-content">
                        <h4><a href="{{ route('site1.product',$prodect->id) }}">{{ $prodect->name }}</a></h4>
                        @if ($prodect->sale_price)
                        <del>Base price : {{ $prodect->price }} $</del>
                        <p class="price">The price after discount : {{ $prodect->sale_price }} $</p>
                        @else
                        <p class="price">The price : {{ $prodect->price }} $</p>
                        @endif
                    </div>
                </div>
            </div>
             @endforeach
          </div>
  </section>


  <!--
  Start Call To Action
  ==================================== -->
  <section class="call-to-action bg-gray section">
      <div class="container">
          <div class="row">
              <div class="col-md-12 text-center">
                @if (session('masg'))
                <div class="row mt-30">
                    <div class="col-xs-12">
                        <div class="alertPart">
                            <div id="successMessage" class="alert alert-success alert-common" role="alert"><i class="tf-ion-thumbsup"></i><span>Well done! </span> You email send successful </div>
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
                  <div class="title">
                      <h2>SUBSCRIBE TO NEWSLETTER</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam impedit ut sequi. Minus facilis vitae excepturi sit laboriosam.</p>
                  </div>
                  <form action="{{ route('site1.sendemil') }}" method="post">
                    @csrf
                  <div class="col-lg-6 col-md-offset-3">
                      <div class="input-group subscription-form">
                        <input type="text" class="form-control" placeholder="Enter Your Email Address" name="email">
                        <span class="input-group-btn">
                          <button class="btn btn-main" type="submit">Subscribe Now!</button>
                        </span>
                      </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </form>
              </div>
          </div> 		<!-- End row -->
      </div>   	<!-- End container -->
  </section>   <!-- End section -->

  <section class="section instagram-feed">
      <div class="container">
          <div class="row">
              <div class="title">
                  <h2>View us on instagram</h2>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <div class="instagram-slider" id="instafeed" data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn"></div>
              </div>
          </div>
      </div>
  </section>

@endsection
