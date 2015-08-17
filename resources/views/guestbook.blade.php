@extends('app')

@section('content')

<div id="guestbook">
    
    <form method="post" v-on="submit: onSubmitForm"> 
       
            <div class="form-group">
                <label for="name">Имя: <span class="error" v-if="! newMessage.name">*</span></label>
                <input type="text" name="name" id="name" class="form-control" v-model="newMessage.name" >
            </div>   
            
            <div class="form-group">
                <label for="message">Сообщение:</label>
                <textarea type="text" name="message" id="message" class="form-control" v-model="newMessage.message"></textarea>
            </div>   
            
              <div class="form-group" v-if="! submitted">
                  
                  <button type="submit" class="btn btn-default" v-attr="disabled:errors">Отправить</button>
              </div>  
          
        <div class="alert alert-success" v-if="submitted">Спасибо</div>
    </form>
   <hr>
	<article v-repeat="messages">

	  <h3>@{{name}}</h3>
	  <div class="body">
	  	@{{message}}
	  </div>
		
	</article>

	<pre>
		@{{ $data | json }}
	</pre>
	
</div>

 @stop