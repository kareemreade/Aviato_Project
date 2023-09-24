@extends('viewSite1.master')
@section('title')
{{  $categorys->name }} categorys
@endsection
@section('contien')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">{{$categorys->name  }}</h1>
					<ol class="breadcrumb">
						<li><a href="{{ route('site1.home') }}">Home</a></li>
						<li class="active">{{$categorys->name  }} categorys </li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="products section">
	<div class="container">
		<div class="row">
            @foreach ($categorys->products as $prodect )
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
        <br>
        <br>
@endsection
