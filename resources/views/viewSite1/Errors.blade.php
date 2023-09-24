@extends('viewSite1.master')
@section('title','Errorspayment | '.env('APP_NAME'))
@section('scripts1')
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
@section('contien')
<!-- Page Wrapper -->
<section class="page-wrapper success-msg">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
              <i style="background-color: red"> <ion-icon name="warning-outline"></ion-icon> </i>
            <h2 class="text-center">Oops Errors</h2>
            <p>The payment process failed, please try again... Thank you</p>
            <a href="{{ route('site1.Checkout') }}" class="btn btn-main mt-20">Return to payment</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /.page-warpper -->
@endsection

