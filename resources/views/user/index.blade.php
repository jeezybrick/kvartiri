@extends('app')

@section('content')
<div class="row">
<div class="col-lg-12">
<div class="col-lg-2">
  ffffff
</div>
<div class="col-lg-10" style="background-color: #fff;">
  <h1>Профиль</h1>

  {!! Form::model($userInfo,['method' => 'PATCH','action' => ['UserController@update',
  $userInfo->id]]) !!}


<div class="form-group">
    {!! Form::label('email','Email:') !!}
    {!! Form::text('email',null,['class' =>'form-control','placeholder' => $users->email,'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('first_name','Имя:') !!}
    {!! Form::text('first_name',null,['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('last_name','Фамилия:') !!}
    {!! Form::text('last_name',null,['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('city','Город:') !!}
    {!! Form::select('city',$city,null,['id'=>'tag_list','class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone','Телефон:') !!}
    {!! Form::text('phone',null,['class' =>'form-control']) !!}
</div>

<div class="form-group">
   {!! Form::label('image','Логотип:') !!}
   {!! Form::file('image') !!}
</div>

<div class="form-group">
    {!! Form::submit('Сохранить',['class' =>'btn btn-primary form-control']) !!}
</div>


    {!! Form::close() !!}
</div>
</div>
</div>
@stop
