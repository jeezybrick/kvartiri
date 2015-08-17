   
 /*Скрипт для смены класса при заданном разрешении 
или уменьшении окна браузера*/

     $(window).resize(function(){
     whatSize();
    });

     function whatSize(){
     if(window.innerWidth < "1200"){
        $("#mainButtons").attr("class", "btn-group btn-group-lg");
     }else{
        $("#mainButtons").attr("class", "btn-group btn-group-sm");
     }
   }
   whatSize();
///////////////////////////////////////////////////////////////////////////////////
 //функции для сортировки 
        $("#sortForm").change(function () {
            this.form.submit();
        });
         $("#sortFormDate").change(function () {
                    this.form.submit();
                });

///////////////////////////////////////////////////////////////////////////////// 
    $('#formLogin,#formRegistration').validate({
        rules: {
             lastname: {
                minlength: 3,
                maxlength: 15,
                required: true
            },
             password: {
                minlength: 6,
                maxlength: 25,
                required: true
            }
        },

          messages:{

            password:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 6 символов",
                maxlength: "Максимальное число символов - 25",
            },
            email:{
                email:    "Введите корректный email-адрес",
                required: "Это поле обязательно для заполнения",
                 }
       },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');

        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
   /////////////////////////////////////////////////////////////////
 //Функция для очистки пустых значений в строке браузера//
/*
function clearEmptyValues()
{
    var myForm = document.getElementById('formSearch');
    var allInputs = myForm.getElementsByTagName('input');
    var allInputsSelect = myForm.getElementsByTagName('option');
    var input, i,select;

    for(i = 0; input = allInputs[i]; i++) {
        if(input.getAttribute('name') && !input.value) {
            input.setAttribute('name', '');
        }
    }

     for(i = 0; input = allInputsSelect[i]; i++) {
        if(select.getAttribute('name') && !select.value) {
            select.setAttribute('name', '');
        }
    }
}*/
        

