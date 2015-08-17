Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

new Vue({

	el:'#guestbook',
   
    data:{
        newMessage:{
            name:'',
            message: ''
        },
        
        submitted:false
            
    },
    
    computed :{
        errors: function(){
            for(var key in this.newMessage){
                if(! this.newMessage[key]) return true;
            }
            
            return false;
        }
    },


	ready: function() {

		this.fetchMessages();
	},

	methods: {

		fetchMessages: function(){
			this.$http.get('/api/messages',function(messages){
				this.$set('messages',messages);
			});


		},
        
        onSubmitForm: function(e){
            
            e.preventDefault();
            
            //назначаем переменную и вписываем в нее 
            //значение массива newMessage
            var message = this.newMessage;
            //Добавляет новое сообщение в массив сообщений
            this.messages.push(message);
            
            //Сбрасывает напечатанный текст после нажатия кнопки
            this.newMessage = {name: '', message:''};
            
            //Для появления сообщения об успешном добавлении
            this.submitted = true;
            
            //Отсылает post запрос серверу
            this.$http.post('api/messages',message);
            
        }
        
        
        
	}
});