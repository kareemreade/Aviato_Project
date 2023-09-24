@extends('viewAdmain.master')
@section('titile','categories |'. env('APP_NAME'))
@section('secript1')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('contien')
<h1>All Categories</h1>
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
                        <th class="">Name</th>
                        <th class="">Image</th>
                        <th class="">Parent</th>
                        <th class="">prodect count</th>
                        <th class="">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($caregories as $categorie)
                      <tr class="">
                        <td class="">{{$categorie->id  }}</td>
                        <td class="">{{ $categorie->name }}</td>
                        <td class=""><img width="120" src="{{asset('uplodesCategories/'.$categorie->image) }}" alt="" /></td>
                        <td class="">{{$categorie->parent->name}}</td>
                        <td class="">{{$categorie->products->count()}}</td>
                        <td class="">
                            <a class="btn btn-info" href="{{ route('Admin.Caregorys.edit',$categorie->id) }}">Updeta</a>
                            <form action="{{route('Admin.Caregorys.destroy',$categorie->id)}}" method="post" class="d-inline servideletebtn">
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
