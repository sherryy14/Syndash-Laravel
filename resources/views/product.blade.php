
@extends('layout.main')

@section('title')
    Products
@endsection

@section('main')
<div class="row">
    <div class="me-5 col-xl-9 mx-auto mt-4">
        <h6 class="mb-0 text-uppercase">Product</h6>
        <hr>
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <div class="d-flex justify-content-between">

                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">All Product</h5>
                    </div>
                    <a href="{{route('addproduct')}}" class="btn btn-primary">Add Product</a>
                </div>
                <hr>
                <table class="table table-hover text-center">
                    <thead>
                        <tr class="table-active">
                            <th>IMAGE</th>
                            <th>TITLE</th>
                            <th>PRICE</th>
                            <th>UNIT</th>
                            <th>CATEGORY</th>
                            <th>AVAILABLITY</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $product)
                        <tr>
                            <td><img src="{{ asset('storage/upload/' . $product->file1) }}" alt="" width="100" height="100"></td>


                            <td><a href="/detail-product/{{$product->p_id}}">{{ $product->title }}</a></td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->unit }}</td>
                            <td>{{ $product->category->category }}</td>
                            <td>{!! ($product->availability == null)? '<span class="badge bg-danger">Not Available</span>' : '<span class="badge bg-success">Available</span>' !!}</td>
                            <td>
                                @if ($product->status == 'Active')
                                    <span class="badge rounded-pill bg-success">{{ $product->status }}</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">{{ $product->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="/edit-product/{{$product->p_id}}" class="btn btn-warning">Edit</a>
                                <a href="/trash-product/{{$product->p_id}}" class="btn btn-danger">Trash</a>
                            </td>
                        </tr>

                        @endforeach
                       
                    </tbody>
                </table>
                <div class="container">
                    {{$products->links()}}
                </div>
             
            </div>
        </div>
     
       
      
       
    </div>
</div>


@endsection