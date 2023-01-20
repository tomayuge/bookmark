@extends('layouts.base_login')
@section('title','search')
@section('main')
<link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/sign-in/">



<!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
<center><img class="text-center py-3" src="{{ asset('img/bkm20.png') }}" alt="ロゴ"></center>

</p>
<!-- <br> -->

<!-- <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style> -->

<!-- Custom styles for this template -->
<link href="signin.css" rel="stylesheet">


<form class="needs-validation col-2 mx-auto" novalidate action="/db/login" method="post">
    @csrf

    <div style="margin-left:40px">ユーザー名<br><input class="col-10 mb-10" type="text" id="user_name" name="user_name" placeholder="ユーザー名を入力" required></div>
    <br>

    <div style="margin-left:40px">パスワード<br><input class="col-10 mb-10" type="password" id="pass" name="pass" placeholder="パスワードを入力" required></div>
    <br><br>
    <center><input class="btn btn-info rounded-0  w-45  " type="submit" value="ログイン"></center>
    <br><br>
</form>
@if (session('err_msg'))
<div style="text-align:center;" p class="text-danger" text-align:center>
    {{ session('err_msg') }}
</div>
@endif
@endsection