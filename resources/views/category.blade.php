
@extends('layout.main')

@section('main')
<div class="row">
    <div class="col-xl-7 mx-auto">
        <h6 class="mb-0 text-uppercase">Category</h6>
        <hr>
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <div class="d-flex justify-content-between">

                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">All Category</h5>
                    </div>
                    <a href="{{route('addcategory')}}" class="btn btn-primary">Add Category</a>
                </div>
                <hr>
                <table class="table table-hover text-center">
                    <thead>
                        <tr class="table-active">
                            <th>ID</th>
                            <th>NAME</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->cat_id}}</td>
                            <td>{{$category->category}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
             
            </div>
        </div>
     
       
      
       
    </div>
</div>


@endsection