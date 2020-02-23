@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <a href="{{route('home')}}" class="btn btn-secondary">
                <span class="fa fa-arrow-left"></span>
                Back
            </a>
        </div>
        <br><br>    
        <div class="col-md-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-8">
                                <img src="{{$data->image}}" alt="" class="img-thumbnail">
                            </div>

                            <div class="col-md-4">
                                <h1>{{$data->name}}</h1>
                                <p>{{$data->desc}}</p>
                                <h3>Rp.{{number_format($data->price)}}</h3>
                                <p style="color : gray">Tersisa {{$data->stock}}</p>
                                <form action="{{route('order',$data->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Quantity">Quantity</label>
                                        <input type="text" name="quantity" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success">
                                        <span class="fa fa-shopping-cart"></span>
                                            Add to cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
