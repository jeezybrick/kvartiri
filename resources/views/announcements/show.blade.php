@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-12 col-md-12 col-sm-12" style="margin:15px 0px;">
            <i class="fa fa-caret-left"></i><a href="{{URL::previous()}}"> Вернуться назад</a>
        </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs" style="padding-left: 0px;">
        @foreach($sameAnnon as $announcement)
           <div class="imageLeftShow col-lg-12 col-md-12">
           <a href="/announcement/{{$announcement->id}}">
            <img src="/uploads/images/{{$announcement->id}}/{{$announcement->id}}.jpg" class="img-responsive" alt="" style="height:100%;width:100%;">
           </a>
           </div>

           <div class="col-lg-12 col-md-12 text-center" style="padding: 0px;background-color: #fff;outline: 1px solid #D7D7D7;">
       <h4><a href="/announcement/{{$announcement->id}}">{{$announcement->street}}</a></h4>
        <h6>{{$announcement->typeOfProperty->first()->type}}, ID {{$announcement->id}}</h6>

            </div>

            <div class="col-lg-12 col-md-12 text-right" style="padding: 5px 0px;margin-bottom:10px;background-color: #F4F4F4;outline: 1px solid #D7D7D7;">
<i class="fa fa-user fa-2x"></i>
<i class="fa fa-home fa-2x"></i>


            </div>
            @endforeach
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="background-color:#fff;outline: 1px solid #D7D7D7;padding:10px 15px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
              <h5><i class="fa fa-clock-o"></i>
<strong>Дата публикации: </strong>{{$announcement->created_at}} ({{$time}})</h5>
                <h1>{{$announcement->street}}</h1>
                <h6>{{$announcement->typeOfProperty->first()->type}}, ID {{$announcement->id}}</h6>
            </div>
             <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 text-left" style="margin-bottom:10px;">
              <h2><span style="padding:10px;color:#fff;background-color:#52C04D;">{{$announcement->price}} {{$announcement->currency}}</span></h2>
            </div>
        </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              
                <table class="table table-striped">
                    <tr>
                        <td>{{$announcement->numberOfRooms->first()->number}} комнат</td>
                        <td>{{$announcement->space}} м<sup>2</sup>
                        </td>
                        <td>1-й этаж</td>
                        <td>хрущевка</td>
                    </tr>
                </table>
                <div class="col-lg-12" style="margin-bottom:15px;padding:0px;">
                    <div class="col-lg-6" style="padding:0px;">

                        <h4><i class="fa fa-male"></i> Пользователь</h4>
                        <h4><i class="fa fa-phone"></i> Телефон</h4>
                        <h4><i class="fa fa-envelope-o"></i> Email</h4>
                        <h4><i class="fa fa-clock-o"></i> 10 до 19</h4>
                    </div>
                    <div class="col-lg-6">
                        <h4>Риелторская контора</h4>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#infoTable" aria-controls="home" role="tab" data-toggle="tab">Информация</a>
                    </li>
                    <li role="presentation"><a href="#facilities" aria-controls="profile" role="tab" data-toggle="tab">Удобства</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="infoTable">
                        <div class="table-responsive">
                            <!-- Таблица для редактирования пользователей -->
                            <table class="table table-striped">
                                <tr>
                                    <td>Адрес:</td>
                                    <td>{{ $announcement->street }}</td>
                                </tr>
                                <tr>
                                    <td>Комнат:</td>
                                    <td>{{ $announcement->numberOfRooms->first()->number }}</td>
                                </tr>
                                <tr>
                                    <td>Площадь:</td>
                                    <td>{{ $announcement->space }}</td>
                                </tr>
                                <tr>
                                    <td>Цена:</td>
                                    <td>{{ $announcement->price }}</td>
                                </tr>
                                <tr>
                                    <td>Район:</td>
                                    <td>{{ $announcement->area->first()->name }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="facilities">
                 <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h5>Балкон</h5>
                    <h5>Бойлер</h5>
                    <h5>Газовая плита</h5>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <h5>Лифт</h5>
                    <h5>Мебель</h5>
                    <h5>Электроплита</h5>
                    </div>
                    
                  </div>

                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:300px;outline: 1px solid #D7D7D7;padding:10px;">
                    <img src="/uploads/images/{{$announcement->id}}/{{$announcement->id}}.jpg" class="img-responsive" alt="" style="height:100%;width:100%;">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:250px;padding:0px;margin:10px 0px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d21423.493081801666!2d35.13475563764171!3d47.84082090160826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1435499698464" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>Описание</h2>
                <h5>{{$announcement->description}}</h5>
            </div>
        </div>
    </div>
</div>
@stop