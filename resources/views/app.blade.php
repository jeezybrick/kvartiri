<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Kvartirki</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">


    <style>
        body {
            padding-top: 50px;
        }
    </style>

    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background-color:#F5F5F7;padding-top:0px;">
    <div class="container">
    <!-- Сообщение после создания обьявления -->

       <div class="row">
         <div class="col-lg-12 text-center">
           @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{Session::get('flash_message')}}
                </div>
           @endif
         </div>
       </div>
        <div class="header hidden-xs" style="margin-top:20px;margin-bottom:35px;">
            <div class="row">
                <div class="head_logo col-lg-9 col-md-8 col-sm-7 hidden-xs" style="padding-left:0px;">
                    <a href="/"><img src="/image/header-logo.png" alt="">
                    </a>
                </div>
                <div class="right_header col-lg-3 col-md-4 col-sm-5 hidden-xs text-right" style="padding-top:45px;">
                   
                    @if (Auth::guest())
                    
                    <button class="btn btn-primary btn-lg" style="background:#686666;" data-toggle="modal" data-target="#myModal"><i class="fa fa-user fa-fw"></i> Вход <i class="fa fa-caret-down"></i>
                    </button> @else
                    <i class="fa fa-user fa-2x"></i>
                    <span class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span style="margin-left:5px;">{{Auth::user()->email}}</span><span class="caret" style="margin-right:10px;"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/user">Мой профиль</a>
                            </li>
                            <li><a href="/user/announcements">Мои обьявления</a>
                            </li>                           
                            <li class="active"><a href="/auth/logout">Выйти</a>
                            </li>
                        </ul>
                    </span>
                    <i class="fa fa-envelope-o fa-2x"></i>
                    <i class="fa fa-cog fa-2x"></i> @endif
                </div>
            </div>
        </div>
        @include('partials.nav')
        
        </div>

    <div class="container">
    @yield('content')
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:25px;">
                <h5>Социальные сети</h5>
                <a class="pull-left" target="_blank" href="#">
                    <img alt="" src="http://s.mesto.ua/static/img/icon-facebook.png">
                </a>
                <a class="pull-left" target="_blank" href="#">
                    <img alt="" src="http://s.mesto.ua/static/img/icon-vkontakte.png">
                </a>
                <a class="pull-left" target="_blank" href="#">
                    <img alt="" src="http://s.mesto.ua/static/img/icon-twitter.png">
                </a>
                <a class="pull-left" target="_blank" href="#">
                    <img alt="" src="http://s.mesto.ua/static/img/icon-google.png">
                </a>
       </div>
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top:20px;padding:20px;border-top: 1px dotted #9cafc4;">
        Copyright © Стаценко А.С. 2015. All Rights Reserved.
        <h4><a href="/guestbook">Оставить отзыв</a></h4>
        </div>
    </div>
    </div>
     
    @include('modals.new')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <!--Vue.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.5/vue.min.js"></script>
    <script src="https://raw.githubusercontent.com/vuejs/vue-resource/master/dist/vue-resource.js"></script>
    <script src="/js/guestbook.js"></script>

    <script src="/js/my.js"></script>
    
    
<script>
$(document).ready(function(){
    $("#buttonSearch").click(function(){
        $(this).button('loading');
    });   
});
</script>

  

    <script>
//Функция для очистки пустых значений в строке браузера(jquery)
 $( "#formSearch,#formSort" ).on( "submit", function( event ) {
      event.preventDefault();
      var url = $( this ).serialize();
      var array = url.split('&');
      var resultArray = [];
      for(i in array){
        console.log(array[i].split('='));
        if(array[i].split('=')[1]){
           resultArray.push(array[i]);
        }
      }
      var url_params = resultArray.join('&');
      var yourURL = "{{url()}}/announcement/search" + "?" + url_params;
      // do your get...
     // alert("location.href to " + yourURL);
      location.href = yourURL;
    });

</script>
    
</body>

</html>