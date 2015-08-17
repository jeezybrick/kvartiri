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
{!! Form::open(['url'=>'announcement/search','method'=>'GET','class' =>'form-horizontal']) !!}

     {!!Form::checkbox('numofrooms[]', 1) !!}
     {!! Form::checkbox('numofrooms[]', 2) !!} 
     {!! Form::submit('Создать обьявление',['class' =>'btn btn-primary btn-lg ']) !!}

{!! Form::close() !!}
        </div>
         @stop