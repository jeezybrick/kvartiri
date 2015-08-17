<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Вход постоянного пользователя</h4>
            </div>
            <div class="modal-body">  
   
   
   <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Вход</a></li>
    <li role="presentation"><a href="#reg" aria-controls="reg" role="tab" data-toggle="tab">Регистрация</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="login">
              <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <br>
                                <br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}" id="formLogin">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Пароль</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" id="loginPass" required>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Запомнить меня
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">Войти!</button>

                                        <a class="btn btn-link" href="{{ url('/password/email') }}">Забыли пароль?</a>
                                    </div>
                                </div>
                            </form>
                            Или войдите, используя социальные сети:
                            <br>
                            <a href="/github" style="color:black;"><i class="fa fa-github fa-4x"></i></a>


                        </div>
                    </div>
                </div>        
    </div>

    <!--//////////////////////-->
    <div role="tabpanel" class="tab-pane" id="reg"> 
             <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.
                                    <br>
                                    <br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}" id="formRegistration">
                                   {!! csrf_field() !!}
                         

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">E-Mail *</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Пароль* </label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Подтвердите пароль *</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Зарегистрироваться
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
        
    </div>

  </div>


         </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
