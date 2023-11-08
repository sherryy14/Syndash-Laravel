@extends('layout.main')
@section('title')
    Detail Product
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
                            <h5 class="mb-0 text-primary">Detail Product</h5>
                        </div>
                    </div>
                    <hr>

                    <div class="container mt-3">
                        <div class="row mt-5">
                            <!-- left image container  -->
                            <div class="col-md-4">
                                <img src="{{ asset('storage/upload/' . $product->file1) }}" alt=""
                                    class="w-100 rounded" id="largeImage" height="300" />
                                <div class="col-12 mt-4">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item"><img src="{{ asset('storage/upload/' . $product->file2) }}"
                                                alt="" class="w-100 rounded img" height="120" id="img1" onmouseenter="image1()">
                                        </div>
                                        <div class="item"><img src="{{ asset('storage/upload/' . $product->file3) }}"
                                                alt="" class="w-100 rounded img" height="120" id="img2" onmouseenter="image2()">
                                        </div>
                                        <div class="item"><img src="{{ asset('storage/upload/' . $product->file4) }}"
                                                alt="" class="w-100 rounded img" height="120" id="img3" onmouseenter="image3()">
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                            <!-- right content container  -->
                            <div class="col-md-8">
                                <p class="text-secondary">{{ $product->category->category }}</p>
                                <h2 class="mt-3">{{ $product->title }}</h2>

                                <!-- stars and reviews  -->
                                <div class="mt-5 d-flex justify-content-between ">
                                    <div class="">

                                        <a href="" class="ratings">{{$product->status}}</a> | <a href=""
                                            class="ratings">{{($product->availability == null)? "Not Available":"Available"}}</a>

                                    </div>

                                </div>


                                <!-- Price  -->
                                <h5 class="price my-4">Price: ${{$product->price}}</h5>

                                <hr>

                                <div class="col-12">
                                    <p><span class="text-warning fs-5">Description:</span> {{$product->description}}</p>

                                    <h6><span class="text-success">Code:</span> {{$product->code}}</h6>
                                    <h6><span class="text-primary">Weight:</span> {{$product->weight}}g</h6>
                                    <h6><span class="text-danger">Units:</span> {{$product->unit}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>




                </div>
            </div>




        </div>
    </div>

    <script>
      
  function image1(){
    document.getElementById('largeImage').src = "{{ asset('storage/upload/' . $product->file1) }}"
  
  }
  function image2(){
    document.getElementById('largeImage').src = "{{ asset('storage/upload/' . $product->file2) }}"

  }
  function image3(){
    document.getElementById('largeImage').src = "{{ asset('storage/upload/' . $product->file3) }}"
   
  }
  function image4(){
    document.getElementById('largeImage').src = "{{ asset('storage/upload/' . $product->file4) }}"
   
  }
    </script>
@endsection
