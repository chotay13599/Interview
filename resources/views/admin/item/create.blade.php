@extends('layouts.app')

@section('content')
<main class="content">
    <div class="container p-0">

        <h1 class="h3 mb-3"><strong>Add </strong> Item</h1>
        <div class="row">
            <div class="col-md-2 ms-auto my-4">
                <a href="{{route('item.index')}} " class="btn btn-dark float-left ">Back</a>
            </div>
        </div>

                <form action="{{route('item.store')}}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="row">

                        <div class="col-md-6">
                                <h3>Item Information</h3>
                            
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Item Name</label>
                                        <input type="text" class="form-control" name="item" placeholder="Input Name" value="{{old('item')}}">
                                        @error('item')
                                            <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Select Category</label>
                                        <select name="category_id" id="" class="form-control" value="{{old('category_id')}}">
                                            <option value="0" selected hidden>Choose Category</option>
                                            @foreach ($categories as $category)
                                                @if ($category->publish == 1)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="price" placeholder="Enter Price" value="{{old('price')}}">
                                        @error('price')
                                            <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="summernote" placeholder="Description" value="{{old('description')}}"></textarea>
                                        
                                        @error('description')
                                            <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <?php
                                        $conditions = ["new", "used", "second hand"];
                                        ?>

                                        <label for="" class="form-label">Select Item Condition</label>
                                        <select name="condition" id="" class="form-control">
                                            <option value="" selected hidden>Choose Item Condition</option>
                                            @foreach($conditions as $condition)
                                                <option value="{{ $condition }}">{{ $condition }}</option>
                                            @endforeach

                                        </select>
                                        @error('condition')
                                            <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <?php
                                        $types = ["for sell", "for buy", "for exchange"];
                                        ?>
                                        <label for="" class="form-label">Select Item Type</label>
                                        <select name="type" id="" class="form-control" value="{{old('type')}}">
                                            <option value="" selected hidden>Choose Item Type</option>
                                            @foreach($types as $type)
                                                <option value="{{ $type }}">{{ $type }}</option>
                                            @endforeach

                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Status</label>
                                       <div class="row w-25">
                                        <div class="col-3">
                                            <input type="checkbox" class="form-check" name="publish"  />
                                        </div>
                                        <div class="col-8">
                                            <label for="img" class="form-label"> Publish</label>
                                        </div>
                                       </div>
                                       
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="img" class="form-label"> Item Photo:</label>
                                        <input type="file" class="form-control" name="img" value="{{old('img')}}" />
                                        @error('img')
                                            <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>       
                                   
                        </div>

                        <div class="col-md-6">
                            <h3>Owner Information</h3>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Owner Name</label>
                                <input type="text" class="form-control" name="owner" placeholder="Input Name" value="{{old('owner')}}">
                                @error('owner')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="phone" placeholder="Input Name" value="{{old('phone')}}">
                                @error('phone')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Input Address" value="{{old('address')}}">
                                @error('address')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Map</label>
                               <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="lat" id="lat" class="form-control" placeholder="lat">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="lng" id="lng" class="form-control" placeholder="lng">
                                    </div>
                               </div>
                               {{-- <div id="map" style="height:400px"></div> --}}
                               <div class="row mt-3">
                                <div class="col-md" id="map" style="height:400px;">

                                </div>
                               </div>
                            </div>



                        </div>


                    </div>
                    
                    



                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </div>
                </form>
            
        



    </div>
</main>

@endsection