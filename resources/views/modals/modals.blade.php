<!-- Modal from login-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Вход постоянного пользователя</h4>
            </div>
            <div class="modal-body">

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

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Пароль</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal from reg-->
<div class="modal fade" id="myModal_reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
            </div>
            <div class="modal-body">
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

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
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
</div>
<!-- Модаль для состояние проэкта -->
<div class='animatedParent'>
    <div class="modal fade" id="myModal_project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm ">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Состояние проэкта</h4>
                </div>
                <div class="modal-body">
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

                                    <div class="text-center" id="jqmeter-container"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modals-->