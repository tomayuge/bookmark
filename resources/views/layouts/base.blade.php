<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('@title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        body {
            /* width: 500px; */
            margin: 10px auto;
            padding: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center; 
            
        }
    </style>
</head>

<!-- <body> -->
<body class="bg-light">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#">Bookmark</a>
        <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link text-white" href="column">検索</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#Flex">新規登録</a>
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
</body>

</html>