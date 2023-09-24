@extends('viewSite1.master')
@section('title','successful payment | '.env('APP_NAME'))
@section('contien')
<!-- Page Wrapper -->
<section class="page-wrapper success-msg">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
              <i class="tf-ion-android-checkmark-circle"></i>
            <h2 class="text-center">Thank you! For your payment</h2>
            <p>The payment process was completed successfully. Thank you for your transaction</p>
            <a href="{{ route('site1.Shop') }}" class="btn btn-main mt-20">Continue Shopping</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /.page-warpper -->
@endsection
