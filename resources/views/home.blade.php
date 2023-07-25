@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('列表') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($noteList as $note)
                            @guest
                            <li class="list-group-item">{{ $note['title'] }}</li></li>
                            @else
                            <li class="list-group-item" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="copyToClipboard('{{ $note['url'] }}')">{{ $note['title'] }}</li>
                            @endguest
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">訊息通知</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                以複製到剪貼簿中
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        function copyToClipboard(url) {
            const el = document.createElement('textarea');
            el.value = url;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        }
    </script>
</div>
@endsection
