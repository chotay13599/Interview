@extends('layouts.home')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center bg-light">
            <img src="{{ asset('img/'.$item->img) }}" alt="" style="height:300px;">
        </div>
        <div class="row">
            <div class="col-6">
                <h3 class="text-uppercase">{{$item->item}}</h3>
                <small>Price: &nbsp;{{$item->price}} MMK</small>
                
                <div class="row mt-2 mb-3 w-50">
                    <div class="col-3">
                        <small><strong>Type</strong></small>
                        <br>
                        <div class="badge badge-secondary text-danger">{{$item->type}}</div>
                    </div>
                    <div class="col-4">
                        <small><strong>Condition</strong></small>
                        <br>
                        <div class="badge badge-secondary text-success">{{$item->condition}}</div>
                    </div>
                    <div class="col-4">
                        <small><strong>Status</strong></small>
                        <br>
                        @if ($item->publish == 1)
                            <div class="badge badge-secondary text-dark">Avaliable</div>
                        @else
                        <div class="badge badge-warning text-danger">Unavaliable</div>
                        @endif

                    </div>
                </div>

                    <h5>Product Description</h5>
                    <p>
                        {!! $item->description !!}
                    </p>

                    <div class="card mt-3 w-50">
                        <h5 class="card-header">Owner Information</h5>
                        <div class="card-body">
                          {{-- <h5 class="card-title">Con</h5> --}}
                          <p class="card-text">Name : {{$item->owner}}</p>
                          <p class="card-text">Phone : {{$item->phone}}</p>
                          <p class="card-text">Address : {{$item->address}}</p>

                          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>                  
            </div>

            <div class="col-6 mt-3">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Map</label>
                   <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="lat" id="lat" class="form-control" value="{{$item->lat}}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="lng" id="lng" class="form-control" value="{{$item->lng}}">
                        </div>
                   </div>
                   <div id="item_map" style="height:400px"></div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function initMap() {
                        let map = new google.maps.Map(document.getElementById("item_map"), {
                            center: {lat: 21.9162,lng: 95.9560},
                            zoom: 5,
                            scrollwheel: true,
                        });
                        const uluru = {lat: 21.9162 ,lng:95.9560};
                        let marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                            draggable: true
                        });
                        google.maps.event.addListener(marker,'position_changed',
                            function (){
                                let lat = marker.position.lat()
                                let lng = marker.position.lng()
                                $('#lat').val(lat)
                                $('#lng').val(lng)
                            })
                        google.maps.event.addListener(map,'click',
                        function (event){
                            pos = event.latLng
                            marker.setPosition(pos)
                        })
                    }

        
        // console.log(location1);
        initMap();
    </script>
@endsection