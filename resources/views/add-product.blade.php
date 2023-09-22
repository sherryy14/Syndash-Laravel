
@extends('layout.main')

@section('main')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <h6 class="mb-0 text-uppercase">Product</h6>
        <hr>
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                    </div>
                    <h5 class="mb-0 text-primary">Product</h5>
                </div>
                <hr>
             

                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-lg-8 col-12">
                        <!-- card -->
                        <div class="card mb-6 card-lg">
                          <!-- card body -->
                          <div class="card-body p-6 ">
                            <h4 class="mb-4 h5">Product Information</h4>
                            <div class="row">
                              <!-- input -->
                              <div class="mb-3 col-lg-6">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Product Name" >
                                <span class="text-danger">
                                    @error('title')
                                        {{$message}}
                                    @enderror
                                </span>
                              </div>
                              <!-- input -->
                              <div class="mb-3 col-lg-6">
                                                        <label class="form-label">Parent Category</label>
                                                        <select class="form-select" name="category" >
                                                            <option selected disabled>Category Name</option>
         
                                                            @foreach ($categories as $category)
                                                            <option value="{{$category->cat_id}}">{{$category->category}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                        <span class="text-danger">
                                                            @error('category')
                                                                {{$message}}
                                                            @enderror
                                                        </span>
                                                    </div>
                              <!-- input -->
                              <div class="mb-3 col-lg-6">
                                <label class="form-label">Weight</label>
                                <input type="number" name="weight" class="form-control" placeholder="Weight" >
                                <span class="text-danger">
                                    @error('weight')
                                        {{$message}}
                                    @enderror
                                </span>
                              </div>
                              <!-- input -->
                              <div class="mb-3 col-lg-6">
                                <label class="form-label">Units</label>
                               <input type="number" name="unit" min="1" class="form-control" placeholder="Unit" >
                               <span class="text-danger">
                                @error('unit')
                                    {{$message}}
                                @enderror
                            </span>
                              </div>
                              <div>
                                <div class="mb-3 col-lg-12 mt-5">
                                  <!-- heading -->
                                  <h4 class="mb-3 h5">Product Images</h4>
            
                                  <!-- input -->
                                  
                                    <div class="fallback">
                                      <input name="file1" type="file" class="form-control my-2" accept="image/png, image/gif, image/jpeg" >
                                      <span class="text-danger">
                                        @error('file1')
                                            {{$message}}
                                        @enderror
                                    </span> 
                                      <input name="file2" type="file" class="form-control my-2" accept="image/png, image/gif, image/jpeg" > 
                                      <span class="text-danger">
                                        @error('file2')
                                            {{$message}}
                                        @enderror
                                    </span>
                                      <input name="file3" type="file" class="form-control my-2" accept="image/png, image/gif, image/jpeg" >
                                      <span class="text-danger">
                                        @error('file3')
                                            {{$message}}
                                        @enderror
                                    </span>
                                      <input name="file4" type="file" class="form-control my-2" accept="image/png, image/gif, image/jpeg" >
                                      <span class="text-danger">
                                        @error('file4')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    </div>
                                    
                                </div>
                              </div>
                              <!-- input -->
                              <div class="mb-3 col-lg-12 mt-5">
                                <h4 class="mb-3 h5">Product Descriptions</h4>
                                <!-- <div class="py-8" id="edi
                                tor"></div> -->
                                <textarea name="desc" placeholder="Write description" cols="30" rows="5"  class="form-control"></textarea> 
                                <span class="text-danger">
                                    @error('desc')
                                        {{$message}}
                                    @enderror
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
            
                      </div>
                      <div class="col-lg-4 col-12">
                        <!-- card -->
                        <div class="card mb-6 card-lg">
                          <!-- card body -->
                          <div class="card-body p-6">
                            <!-- input -->
                            <div class="form-check form-switch mb-4">
                              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchStock" name="availability" checked>
                              <label class="form-check-label" for="flexSwitchStock">In Stock</label>
                            </div>
                            <!-- input -->
                            <div>
                              <div class="mb-3">
                                <label class="form-label">Product Code</label>
                                <input type="text"  name="code" class="form-control" placeholder="Enter Product Title">
                                <span class="text-danger">
                                    @error('code')
                                        {{$message}}
                                    @enderror
                                </span>
                              </div>
                             
                              <!-- input -->
                              <div class="mb-3">
                                <label class="form-label" id="productSKU">Status</label><br>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                    value="Active" checked>
                                  <label class="form-check-label" for="inlineRadio1">Active</label>
                                </div>
                                <!-- input -->
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                    value="Disable">
                                  <label class="form-check-label" for="inlineRadio2">Disabled</label>
                                </div>
                                <!-- input -->
            
                              </div>
            
                            </div>
                          </div>
                        </div>
                        <!-- card -->
                        <div class="card mb-6 card-lg">
                          <!-- card body -->
                          <div class="card-body p-6">
                            <h4 class="mb-4 h5">Product Price</h4>
                            <!-- input -->
                            <div class="mb-3">
                              <label class="form-label">Price</label>
                              <input type="number" name="price" class="form-control" placeholder="$0.00 " >
                              <span class="text-danger">
                                @error('price')
                                    {{$message}}
                                @enderror
                            </span>
                            </div>
                         
            
                          </div>
                        </div>
                        <!-- card -->
                        <div class="card mb-6 card-lg">
                          
                        </div>
                        <!-- button -->
                        <div class="d-grid">
                         <input type="submit" class="btn btn-primary" name="add" value=" Create Product">
                          
                          
                        </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
     
       
      
       
    </div>
</div>


@endsection