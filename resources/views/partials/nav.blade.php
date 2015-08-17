     <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="index.html">KVARTIRKI.UA</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse" style="padding-left:0px;padding-right:0px;">

                    <ul class="nav nav-pills nav-justified">
                        <li class="actives text-center">
                            <a href="/">
                                <span style="border-bottom: 2px solid #ff1b55;">Продажа</span> </a>
                        </li>
                        <li><a href="#" id="order">Аренда</a>
                        </li>
                        <li><a href="#" id="service">Посуточно</a>
                        </li>
                        <li><a href="#" id="contacts">Новостройки</a>
                        </li>
                        <li><a href="#">Путеводитель</a>
                        </li>
                        <li><a href="#">Агенства 
                        недвижимости</a>
                        </li>
                        <li style="background-color:#FF1B55"><a href="/announcement/create" style="color:#FFFFFF;">Добавить 
                        обьявление</a>
                        </li>
                         @if (Auth::guest())
                    
                    <button class="btn btn-primary btn-block btn-lg hidden-lg hidden-md hidden-sm" style="background:#686666;margin-top:15px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-user fa-fw"></i> Вход <i class="fa fa-caret-down"></i>
                    </button>
                    @else

                      <a class="btn btn-primary btn-block btn-lg hidden-lg hidden-md hidden-sm" style="background:#686666;margin-top:15px;color: #fff;" href="/user"><i class="fa fa-user fa-fw"></i> Мой профиль</a>

                    @endif
                        {{--<li class="hidden-lg hidden-md hidden-sm" style="background-color:blue;"><a href="#" data-toggle="modal" data-target="#myModal" style="color:#fff;">Вход/Регистрация</a>
                        </li>--}}

                    </ul>

                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>