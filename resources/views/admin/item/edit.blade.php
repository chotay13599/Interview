@extends('layouts.app')

@section('content')

<main class="content">
    <div class="container p-0">
        {{-- <h1 class="h3 mb-3"><strong>Item</strong> Information</h1> --}}
        <div class="row">
            <div class="col-md-2 ms-auto my-4">
                <a href="{{route('item.index')}} " class="btn btn-dark float-left ">Back</a>
            </div>
        </div>

                <form action="{{route('item.update',$item->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <img src="/img/{{$item->img}}" style="width:200px;height:200px" alt="" title="image" />  
                    </div>
                    {{-- <img src="{{ asset('storage/app/public/{{$category->img}}') }}" alt="Image"> --}}
                    {{-- <img src="{{ url('storage/app/public/images/'.$category->img) }}" alt="{{ $category->name }}" width="100"> --}}
                   <div class="row mt-3">
                        <div class="col-md-6">
                            <h3>Item Information</h3>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Item Name</label>
                                <input type="text" class="form-control" name="item" placeholder="Input Name" value="{{$item->item}}">
                                @error('item')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <select name="category_id" id="" class="form-control">
                                    <option value="0" selected hidden>Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if($item->category->id == $category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter Price" value="{{$item->price}}">
                                @error('price')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Description</label>
                                <div id="value" hidden>{{strip_tags($item->description)}}</div>
                                <textarea class="form-control" name="description" id="edit_summernote" placeholder="Description"></textarea>
                                
                                @error('description')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                @php
                                    $conditions = ["new", "used", "second hand"];
                                @endphp

                                <label for="" class="form-label">Select Item Condition</label>

                                <select name="condition" id="" class="form-control" >
                                    <option value="">Choose Item Condition</option>
                                    @foreach($conditions as $condition)
                                        <option value="{{ $condition }}" @selected($condition == $item->condition)>{{ $condition }}</option>
                                    @endforeach

                                </select>
                                @error('condition')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                @php
                                $types = ["for sell", "for buy", "for exchange"];
                                @endphp
                                <label for="" class="form-label">Select Item Type</label>
                                <select name="type" id="" class="form-control" value="{{old('type')}}">
                                    <option value="" selected hidden>Choose Item Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type }}" @selected($type == $item->type)>{{ $type }}</option>
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
                                            <input type="checkbox" class="form-check" name="publish" value="1"  {{ $item->publish ? 'checked' : '' }}/>
                                        </div>
                                        <div class="col-8">
                                            <label for="img" class="form-label"> Publish</label>
                                        </div>
                                </div>

                            </div>

                            <div class="form-group mb-3">
                                    
                                <label for="" >Item Photo</label>  
                                <input type="file" class="form-control" name="img"  >
                            
                            </div>

                        </div>

                        <div class="col-md-6">
                            <h3>Owner Information</h3>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Owner Name</label>
                                <input type="text" class="form-control" name="owner" placeholder="Input Name" value="{{$item->owner}}">
                                @error('owner')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="phone" placeholder="Input Name" value="{{$item->phone}}">
                                @error('phone')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="{{$item->address}}">
                                @error('address')
                                    <span class="text-danger">{{$message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Map</label>
                               <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="lat" id="lat" class="form-control" placeholder="lat" value="{{$item->lat}}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="lng" id="lng" class="form-control" placeholder="lng" value="{{$item->lng}}">
                                    </div>
                               </div>
                               <div id="map" style="height:400px"></div>
                               {{-- <div class="row mt-3">
                                <div class="col-md" id="map" style="height:400px;">

                                </div>
                               </div> --}}
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
    
<script>
    $(document).ready(function(){
        var value = $('#value').html();
        $('#edit_summernote').summernote('pasteHTML',value);
    })
</script>
@endsection