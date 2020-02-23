@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                    @foreach($data as $data)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                        <img class="card-img-top img-thumbnail" src="{{$data->image}}" alt="Card image cap" style="width : 100% ; height : 200px">
                        <div class="card-body">
                            <h5 class="card-title">{{$data->name}}</h5>
                            <p class="card-text">{{$data->desc}}</p>
                            <p class="card-text" style="color : gray ">Rp.{{number_format($data->price)}}</p>
                            <a href="{{route('order-detail',$data->id)}}" class="btn btn-success">
                            <span class="fa fa-shopping-cart"></span>
                            Pesan
                            </a>
                        </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
