@extends('layouts.app')

@section('content')
<div class="container">
<section id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">コインパーキング料金計算</h2>
        <br>
        <h4 class="section-subheading text-muted">登録したコインパーキングから、料金計算ができます。</h4>
        <h3 class="section-subheading text-muted">How to use?</h3>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-4">
        <span class="fa-stack fa-4x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
        </span>
        <h4 class="service-heading">Step1<br><br>ユーザー登録</h4>
        <p class="">初めに、ユーザー登録とログインをお願いします。<br>
        <strong class=""><u>（採用ご担当者様向けに、登録不要の専用ログインフォームをご用意しております)</u></strong></p>
      </div>
      <div class="col-md-4">
        <span class="fa-stack fa-4x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-users fa-stack-1x fa-inverse"></i>
        </span>
        <h4 class="service-heading">Step2<br><br>コインパーキング登録</h4>
        <p class="text-muted">コインパーキングの情報を登録してください。料金だけでなく、自分用のメモもできます。<br>もちろん後から修正や削除もできます。</p>
      </div>
      <div class="col-md-4">
        <span class="fa-stack fa-4x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
        </span>
        <h4 class="service-heading">Step3<br><br>料金計算</h4>
        <p class="text-muted">計算したい期間を選択し、「料金計算」ボタンをクリックしてください。登録したコインパーキング毎に、料金計算結果が表示されます！</p>
      </div>
    </div>
  </div>
</section>
<br>
<!--採用ご担当者様用フォーム-->
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('採用ご担当者様ご専用 ログインフォーム') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="dokokanokafka@gmail.com" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="kyoto2020" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('専用ログイン') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
<!--一般用フォーム-->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
