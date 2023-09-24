@extends('viewAdmain.master')
@section('titile','products |'. env('APP_NAME'))
@section('secript1')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('contien')
<h1>All Users</h1>
<div class="page-wrapper p-4 ">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
              <div class="product-list">
                  <table class="table table-striped table-bordered " style="width: 980px">
                    <thead class="table-dark">
                      <tr >
                        <th class="">ID</th>
                        <th class="">Full Name</th>
                        <th class="">Type</th>
                        <th class="">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                      <tr class="">
                        <td class="">{{$user->id  }}</td>
                        <td class="">{{ $user->First_name }} {{$user->last_name  }}</td>
                        <td class="">{{ $user->type }}</td>
                        <td class="">
                            <form action="{{route('Admin.users.destroy',$user->id)}}" method="post" class="d-inline servideletebtn">
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
