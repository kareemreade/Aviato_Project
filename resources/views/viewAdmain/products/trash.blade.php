@extends('viewAdmain.master')
@section('titile','tresh |' .env('APP_NAME'))
@section('secript1')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('contien')
<h1>Trash products</h1>
<div class="page-wrapper p-4 ">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
              <div class="product-list">
                  <table class="table table-striped table-bordered " style="width: 700px">
                    <thead class="table-dark">
                      <tr >
                        <th class="">ID</th>
                        <th class="">Name</th>
                        <th class="">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                     @foreach ($products as $product)
                      <tr class="">
                        <td class="">{{$product->id  }}</td>
                        <td class="">{{ $product->name }}</td>
                        <td class="">
                            <a class="btn btn-info" href="{{ route('Admin.products.restor',$product->id) }}">recovery</a>
                             <form action="{{route('Admin.products.forcedelete',$product->id)}}" method="post" class="d-inline servideletebtn">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"> Delete Permanently</button>
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

















