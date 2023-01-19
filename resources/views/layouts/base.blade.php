<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('@title')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    body {
      /* width: 500px; */
      /* margin: 10px;  
      /* padding: 0;   */
      /* margin-top:    1px; */
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
      background-color: ghostwhite;
      /* text-align: center;  */
      
    }

    .table td {
      vertical-align: middle;
    }
  </style>
  <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<body class="bg-light">
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <!-- <nav class="navbar navbar-expand-lg" style="height:50px; background-color: #bccddb;"> -->
      <div style="padding: 15px;">
        <a class="navbar-brand text-white" href="/db/index">Bookmark</a>
      </div>
      <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <!-- <a class="nav-link text-white" href="column">検索</a> -->
            <a class="nav-link text-white" href="/db/index">トップページ</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link text-white" href="#Flex">新規登録</a> -->
            <a class="nav-link text-white" href="/db/insert">新規登録</a>

          <li class="nav-item">
            <!-- <a class="nav-link text-white" href="#Flex">新規登録</a> -->
            <a class="nav-link text-white" href="/db/list">全件表示</a>

          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/db/logout">ログアウト</a>
          </li>
          <!-- <li class="nav-item">
              <a class="nav-link text-white" href="#tab">tab</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#Embeds">Embeds</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#modal">modal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#card">card</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#accordion">accordion</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link text-white" href="#">contactform</a>
            </li>  -->
        </ul>
      </div>
    </nav>
    <br>
  </header>

  @section('main')
  @show



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <br><br><br><br><br>

  <div class="fixed-bottom" style="height:50px; background-color: #E6EAE6;">
    <footer class="bg-#f5af7d; ">
      <!-- <div class="container">
        <div class="row">
          <div class="col-md-4 col-12">
            <div class="py-4">
              <h4 class="d-inline-block py-3 border-bottom border-info">Profile</h4>
            </div>
            <div class="mx-5">
              <img class="img-fluid rounded-circle" src="img/img12.jpg" alt="">
            </div>
            <p>
              プログラミング・ブログを愛しています 普通の学生→リゾバなどで100万円以上貯金→WEB制作で稼ぎながらフリーランスエンジニア週２勤務 自身の経験を活かし高校生から大人まで100人以上にプログラミングを教え電子書籍でAmazon WEB構築ランキング1位｜WEBで約月60万円稼ぎつつ大学生
            </p>
          </div>
          <div class="col-md-4 col-12">
            <div class="py-4">
              <h4 class="d-inline-block py-3 border-bottom border-info">Portfolio</h4>
            </div>
            <ul class="list-group list-group-flush"">
              <li class="list-group-item"><a href="">YouTube Channel</a></li>
              <li class="list-group-item"><a href="">Portfolio Site</a></li>
              <li class="list-group-item"><a href="">Amazon</a></li>
              <li class="list-group-item"><a href="">Twitter</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-12">
            <div class="py-4">
              <h4 class="d-inline-block py-3 border-bottom border-info">Portfolio</h4>
            </div>
            <a class="twitter-timeline" data-lang="ja" data-height="500" href="https://twitter.com/shimo_tmk?ref_src=twsrc%5Etfw">Tweets by shimo_tmk</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>          </div>
        </div>
      </div> -->
      <!-- <div class="bg-dark text-white text-center p-3"> -->

      <span class="text-muted">
        <div class="text-center ">

          Copyright - Shabani Residence, 2023 All Rights Reserved.
      </span>
  </div>
  </footer>
  </div>


  <!-- <footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted"> Copyright - Shabani Residence, 2023 All Rights Reserved.
      </div></span>
  </div>
</footer> -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>