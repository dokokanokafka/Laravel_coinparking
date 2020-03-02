@extends('layouts.app')

@section('content')
<meta http-equiv="refresh" content=" 5; url=/">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登録完了</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    登録できました。5秒後に自動で画面が切り替わります。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
