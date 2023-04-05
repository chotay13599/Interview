@extends('layouts.app')

@section('content')

<main class="content">
    <div class="container p-0">

        <h1 class="h3 mb-3"><strong>Category</strong> Information</h1>
        <div class="row">
            <div class="col-md-2 ms-auto my-4">
                <a href="{{route('category.index')}} " class="btn btn-dark float-left ">Back</a>
            </div>
        </div>

                <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <img src="/img/{{$category->img}}" style="width:200px;height:200px" alt="" title="image"/>  
                    {{-- <img src="{{ asset('storage/app/public/{{$category->img}}') }}" alt="Image"> --}}
                    {{-- <img src="{{ url('storage/app/public/images/'.$category->img) }}" alt="{{ $category->name }}" width="100"> --}}
                    <div class="row mt-3">
                        <div class="col-md-7">
                            <div class="form-group mb-3">
                                <label for="" >Category</label>
                                <input type="text" class="form-control" name="name" placeholder="Input Name" value="{{($category->name)}}">
                                @error('name')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                
                                <label for="" >Category Photo</label>  
                                <input type="file" class="form-control" name="img" value="{{$category->img}}" >
                               
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Status</label>
                                   <div class="row w-25">
                                        <div class="col-2">
                                            <input type="checkbox" class="form-check" name="publish" value="1"  {{ $category->publish ? 'checked' : '' }}/>
                                        </div>
                                        <div class="col-10">
                                            <label for="img" class="form-label"> Publish</label>
                                        </div>
                                   </div>

                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Update</button>

                        </div>
                    </div>
                </form>
            
        



    </div>
</main>
    
@endsection