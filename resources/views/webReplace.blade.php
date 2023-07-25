@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$messageTilte}}</div>

                <div class="card-body">
                    <p class="card-text">
                        {{$message}}
                        <b style="color: red">
                            {{$password}}
                        </b>
                        , 請跳轉至<a href="{{$url}}">{{$urlname}}</a>頁面重新登入
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection