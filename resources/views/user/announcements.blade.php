   @extends('app')

@section('content')
<h2>Найдено {{$userAnnouncementsAmount}} обьявления</h2>
 <div class="well">

   @foreach($userAnnouncements as $announcement)

     <div class="property" style="height:250px;background-color:#E6E6E6;margin-top:5px;;margin-bottom:5px;padding:10px;">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="height:100%;padding:0px;">

                        <img src="/uploads/images/{{$announcement->id}}/{{$announcement->id}}.jpg" class="img-responsive" alt="" style="height:100%;">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="height:100%;padding:10px;">
                        <h3 class="street"><a href="/announcement/{{$announcement->id}}" style="color:#FF1B55;">{{$announcement->area()->first()->name}}</a></h3>
                        <h5 style="margin:0px;color:#6E6E6E;">{{$announcement->city()->first()->city}}ая область, {{$announcement->city()->first()->city}}
</h5>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#fff;margin:25px 0px;line-height: 46px;text-align:center;font-size: 16px;padding: 0px;">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="outline: 1px solid orange;padding:0px;">{{$announcement->numberOfRooms->number}} комнаты </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="outline: 1px solid orange;padding:0px;">{{$announcement->space}} м<sup>2</sup>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h5>Цена:{{$announcement->price}}{{$announcement->currency}}</h5>
                            <h5>Дата:{{$announcement->created_at}}</h5>
                        </div>
                    </div>

                </div>

    @endforeach
  </div>

@stop
