@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('確認你的E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('新的連結已發送至你的E-mail') }}
                        </div>
                    @endif

                    {{ __('繼續之前，請檢查您的電子郵件中是否有驗證鏈接') }}
                    {{ __('如果您沒有收到電子郵件') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('點擊此處，再次發送驗證鏈接') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
