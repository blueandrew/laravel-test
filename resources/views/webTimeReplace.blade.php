@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$messageTilte}}</div>

                <div class="card-body">
                    {{$message}}{{$password}}
                    將在
                    <span class="loginTime" style="color: red">{{$jumpTime}}</span>
                    秒後跳轉至
                    <a href="{{$url}}" style="color: red">{{$urlname}}</a>
                    頁面
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    window.onload = function(){
        var url = "{{$url}}"
        var loginTime = parseInt(document.getElementsByClassName('loginTime')[0].textContent)
        var time = setInterval(function(){
            loginTime = loginTime-1;
            document.getElementsByClassName('loginTime')[0].textContent = loginTime
            if(loginTime==0){
                clearInterval(time);
                window.location.href=url;
            }
        },1000);
    }
</script>