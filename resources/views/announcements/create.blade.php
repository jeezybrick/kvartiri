   @extends('app')

@section('content')
      
       <div class="panel-body">
<h1>Добавить новое обьявление</h1>

<hr />
 @if($errors->any())
   <ul class="alert alert-danger">

    @foreach($errors->all() as $error)

      <li>{{$error}}</li>

    @endforeach
   </ul>
 @endif
{!! Form::open(['url'=>'announcement/store','method'=>'POST', 'files'=>true,'class' =>'form-horizontal']) !!}

<div class="form-group">
    {!! Form::label('typeOfProperty','*Тип недвижимости:',['class' =>'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::select('typeOfProperty',$typeOfProperty,null,['id'=>'typeOfProperty','class' =>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('city','*Город:',['class' =>'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::select('city',$city,null,['id'=>'city','class' =>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('street','*Улица:',['class' =>'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('street',null,['class' =>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('numberOfRooms','*Количество комнат:',['class' =>'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::select('numberOfRooms',$numberOfRooms,null,['id'=>'numberOfRooms','class' =>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('space','*Площадь:',['class' =>'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('space',null,['class' =>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description','*Описание:',['class' =>'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::textarea('description',null,['class' =>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('price','*Цена:',['class' =>'col-sm-2 control-label']) !!}
    <div class="col-sm-5 col-xs-12">
      <div class="col-sm-8 col-xs-8" style="padding:0px;">
        {!! Form::text('price',null,['class' =>'form-control']) !!}
      </div>
       <div class="col-sm-4 col-xs-4" style="padding-right:0px;">
       {{-- '$' это ключ в массиве для выбора элемента по умолчанию--}}
       {!! Form::select('currency', array('грн' => 'грн','$' => '$','€' => '€'), '$',['id'=>'currency','class' =>'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('area','*Район:',['class' =>'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::select('area',$area,null,['id'=>'area','class' =>'form-control']) !!}
    </div>
</div>


<div class="form-group">
   {!! Form::label('image','*Фотографии:',['class' =>'col-sm-2 control-label']) !!}
   <div class="col-sm-5">
    {!! Form::file('image') !!}
    </div>
    <p class="errors">{!!$errors->first('image')!!}</p>
    @if(Session::has('error'))
    <p class="errors">{!! Session::get('error') !!}</p>
    @endif
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-5">
        {!! Form::submit('Создать обьявление',['class' =>'btn btn-primary btn-lg btn-block']) !!}
    </div>
</div>

{!! Form::close() !!}
        </div>
         @stop