<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* أسلوب للصفحة بشكل عام */
                /* أسلوب لزر تسجيل الخروج */
                #logoutButton {
                    border: none;
                    border-radius: 5px;
                    font-size: 12px;
                    margin-top: 8px;
                }

                /* أسلوب لصندوق التأكيد (الخلفية الرمادية) */
                .modal {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.7);
                    z-index: 1;
                }

                /* أسلوب لمحتوى صندوق التأكيد */
                .modal-content {
                    background-color: rgb(128, 124, 124);
                    padding: 20px;
                    border-radius: 5px;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    text-align: center;
                }

                /* أسلوب لأزرار التأكيد والإلغاء */
                .confirm-button,
                .cancel-button {
                    padding: 10px 20px;
                    font-size: 16px;
                    margin: 10px;
                    cursor: pointer;
                    border: none;
                    border-radius: 5px;
                }

                .confirm-button {
                    background-color: #000000;
                    color: white;
                }

                .cancel-button {
                    background-color: #f44336;
                    color: white;
                    font-size: 12px;

                }

    </style>
  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>@yield('title','aviato')</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- theme meta -->
  <meta name="theme-name" content="aviato" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('site1asset/images/favicon.png') }}" />

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/themefisher-font/style.css') }}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/bootstrap/css/bootstrap.min.css') }}">

  <!-- Animate css -->
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/animate/animate.css') }}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('site1asset/plugins/slick/slick-theme.css') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('site1asset/css/style.css') }}">
  @yield('scripts1')
  @yield('styles1')

</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
				    <a href="tel:0129- 12323-123123" >
                	    <i class="tf-ion-ios-telephone"></i>
					    <span>0129- 12323-123123</span>
                        @if (Auth::id())
                        <ul class="top-menu text-right list-inline" style="margin-top:-30px;margin-right:0px">
                            <li class="dropdown cart-nav dropdown-slide">
                                <a style="font-size: 13px" href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                        class=""></i> <img style="border-radius: 20px" class="img-profile rounded-circle" width="40px"
                                        src="https://ui-avatars.com/api/?name={{Auth::user()->First_name}} {{ Auth::user()->last_name }}">
                                        {{ Auth::user()->First_name }} {{ Auth::user()->last_name }}
                               </a>
                                <div class="dropdown-menu cart-dropdown">
                                    <!-- Cart Item -->
                                    <ul class="text-center">

                                        <li><a href="{{ route('site1.showcart') }}" class="btn btn-small" style="border: none;
                                            border-radius: 5px;
                                            font-size: 12px;
                                            margin-top: 8px;">View Profile </a></li>
                                        <button class="btn btn-small btn-solid-border" id="logoutButton">logout</button>

                                    </ul>
                                </div>

                            </li><!-- / Cart -->
                        </ul>
                        <div id="confirmationModal" class="modal">
                            <div class="modal-content">
                                <p>Are you sure you want to log out?</p>
                                <a class="btn btn-drak" style="background-color: #000000 ;color: rgb(255, 255, 255)" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                              <button id="cancelLogout" class="cancel-button">cancel</button>
                            </div>
                        </div>

                        <script >
                                        const logoutButton = document.getElementById('logoutButton');
                                        const confirmationModal = document.getElementById('confirmationModal');
                                        const confirmLogoutButton = document.getElementById('confirmLogout');
                                        const cancelLogoutButton = document.getElementById('cancelLogout');

                                        logoutButton.addEventListener('click', () => {
                                        confirmationModal.style.display = 'block';
                                        });

                                        cancelLogoutButton.addEventListener('click', () => {
                                        confirmationModal.style.display = 'none';
                                        });

                        </script>


                        @else
                        <span style="margin-left:29px"><a class="btn btn-dark btn-sm" style="background-color: black; color: rgb(255, 255, 255)" href="{{ route('login') }}">sign in</a></span>
                        <span style="margin-left:8px" ><a class="btn btn-dark btn-sm" style="background-color: rgb(248, 248, 248); color: rgb(0, 0, 0);" href="{{ route('register') }}">Create Account</a></span>
                        @endif

                    </a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="{{ route('site1.home') }}">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325">AVIATO</tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-android-cart"></i>{{ __('siet.Cart') }}</a>
						<div class="dropdown-menu cart-dropdown">
							<!-- Cart Item -->
                            @php
                                $total =0;
                            @endphp

                            @auth

                            @foreach ($carts as $cart )
                            <div class="media">
								<a class="pull-left" href="#!">
									<img class="media-object" src="{{ asset('uplodesproducts/'.$cart->product->image ) }}" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#!">{{$cart->product->name  }}</a></h4>
									<div class="cart-price">
										<span>{{$cart->quantity }} x</span>
										<span>{{$cart->price }}</span>
									</div>

									<h5><strong>${{$cart->quantity
                                    *
                                    $cart->price}}</strong></h5>
								</div>
                                <form action="{{ route('site1.destroy',$cart->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button style="background-color: none; border: none" class="remove"><i class="tf-ion-close"></i></button>
                                </form>
							</div>
                            @php
                            $total += $cart->quantity * $cart->price ;
                             @endphp
                            @endforeach
                            @endauth
							<div class="cart-summary">
								<span>Total</span>
								<span class="total-price">$ {{ $total }}</span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="{{ route('site1.showcart') }}" class="btn btn-small">View Cart</a></li>
								<li><a href="{{ route('site1.Checkout') }}" class="btn btn-small btn-solid-border">Checkout</a></li>
							</ul>
						</div>

					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="{{ route('site1.Search') }} " method="get"><input type="search" name="search" class="form-control" placeholder="Search..."></form>
                                        @csrf
                            </li>
						</ul>
					</li><!-- / Search -->

					<!-- Languages -->
					<li class="commonSelect">
						<select class="form-control" onchange="window.location.href = this.value">
                            <option>{{ __('siet.Languages') }}</option>
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <option value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <a class="nav-link active " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['nati'] }}
                                    </a> </option>
                                @endforeach

						</select>


					</li><!-- / Languages -->



				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>

</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="{{ route('site1.home') }}">{{ __('siet.Home') }}</a>
					</li><!-- / Home -->

                    <!-- shop -->
                    <li class="dropdown ">
                        <a href="{{ route('site1.Shop') }}">shop</a>
                    </li><!-- / shop -->
					<!-- Blog -->
                    <li class="dropdown full-width dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">CATEGORIES <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Introduction -->
                                @foreach ($privite_categories as $itemss )
                                <div class="col-sm-3 col-xs-12">
									<ul>
                                        <li class="dropdown-header">{{$itemss->name }}</li>
										<li role="separator" class="divider"></li>
                                        @foreach ($itemss->childrn as $child )
										<li><a href="{{route('site1.category',$child->id)}}">{{ $child->name }}</a></li>
                                        @endforeach

									</ul>
								</div>
                                @endforeach

                            </div>
                        </div>
                    </li>
					{{-- <li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">CATEGORIES <span
								class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
                            @foreach ( $globel_categories as $items )
							<li><a href="{{ route('site1.category',$items->id) }}">{{ $items->name }}</a></li>
                            @endforeach

						</ul>

					</li><!-- / Blog --> --}}

					<!-- Shop -->

				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>
@yield('contien')

<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="https://www.facebook.com/kareem.reade?mibextid=ZbWKwL" target="_blank">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://instagram.com/kareem_reida?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D" target="_blank">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="https://twitter.com/kareem1772002?t=-d0efM3dy5E_I_c9-tNpdw&s=09"  target="_blank">
							<i class="tf-ion-social-twitter"></i>
						</a>
					</li>
					<li>
						<a href="https://pin.it/5VEBMrL" target="_blank">
							<i class="tf-ion-social-pinterest"></i>
						</a>
					</li>
				</ul>
				<ul class="footer-menu text-uppercase">

					<li>
						<a href="{{ route('site1.Shop') }}">SHOP</a>
					</li>


				</ul>
				<p class="copyright-text">Copyright &copy;2023, Designed &amp; Developed by <a href="https://www.facebook.com/kareem.reade?mibextid=ZbWKwL">Kareem Raida</a></p>
			</div>
		</div>
	</div>
</footer>
    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{ asset('site1asset/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('site1asset/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('site1asset/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('site1asset/plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('site1asset/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('site1asset/plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('site1asset/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('site1asset/plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('site1asset/plugins/google-map/gmap.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('site1asset/js/script.js') }}"></script>


    @yield('scripts2')
    @yield('styles2')
  </body>
  </html>
