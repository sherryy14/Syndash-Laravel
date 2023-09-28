
@extends('layout.main')

@section('main')
<div class="row">
    <div class="col-xl-7 mx-auto">
        <h6 class="mb-0 text-uppercase">Category</h6>
        <hr>
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                    </div>
                    <h5 class="mb-0 text-primary">{{$title}} Category</h5>
                </div>
                <hr>
                <form class="row g-3" method="post" action="{{$url}}">
                    @csrf
                    
                    <div class="col-md-6 offset-3">
                        <label for="category" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category" id="category" value="{{old('category')}}{{@$categories->category}}">

                        <span class="text-danger">
                            @error('category')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

            
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary px-5">{{$title}} Category</button>
                    </div>
                </form>
            </div>
        </div>
     
       
      
       
    </div>
</div>


@endsection