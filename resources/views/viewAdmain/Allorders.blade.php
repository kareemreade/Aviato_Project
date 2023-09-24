@extends('viewAdmain.master')
@section('titile','orders |'. env('APP_NAME'))
@section('secript1')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('contien')
<h1>All orders</h1>
<div class="page-wrapper p-4 ">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
              <div class="product-list">
                  <table class="table table-striped table-bordered " style="width: 900px">
                    <thead class="table-dark">
                      <tr >
                        <th class="">ID</th>
                        <th class="">Name user</th>
                        <th class="">total</th>
                        <th class="">user_id</th>
                        <th class="">created_at</th>
                        <th class="">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)
                      <tr class="">
                        <td class="">{{$order->id  }}</td>
                        <td class="" style="padding-right: 20px">{{$order->user->First_name}} {{ $order->user->last_name }} </td>
                        <td class="" > $ {{$order->total}}</td>
                        <td class="" >  {{$order->user_id}}</td>
                        <td class="" >  {{$order->created_at}}</td>
                        <td class="">
                            <form action="{{route('Admin.order_destory',$order->id)}}" method="post" class="d-inline servideletebtn">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('secript2')
<script>
    @if (session('masg'))
        Swal.fire(
    'Good job!',
    '{{ session("masg") }}',
    'success'
    )
    @endif
</script>
    <script>
        $(document).ready(function () {

                $('.servideletebtn').click(function(e){
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "   You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                                })
                        .then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            this.submit();

                        }
                        })


                });

            });

            </script>


@endsection
