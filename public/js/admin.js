$(function(){
    let error_pass = false, error_email = false;

    const alertMessage = (id, errorClass, text) => {
        return $(id).next(errorClass).html(text).show('slow');
    };

    const deleteMessage = (errorClass) => {
        return $(errorClass).hide();
    };
    const requiredMessage = (errorClass, text) => {
        return $(errorClass).html(text).show('slow');
    };
    const borderColorMessage = (id) => {
        return $(id).css('border-color', 'red');
    };


    $(document).on('blur', '#email', function () {
        let string = $(this).val();
        let filter = /^[0-9 +]+$/;
        let number = /^(\+)[0-9]{11,12}/;
        let email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if(string === ''){
            alertMessage(this, '.error-email', 'Field email or phone is required');
            error_email = false;
        }else{
            if(string.match(filter)){

                if(!string.match(number)){
                    alertMessage(this, '.error-email', 'Your number is incorrect. Ex +380633471236');
                    error_email = false;
                }else{
                    deleteMessage('.error-email');
                    error_email = true;
                }
            }else{

                if(!string.match(email)){
                    alertMessage(this, '.error-email', 'Your email is incorrect');
                    error_email = false;
                }else {
                    $.ajax({
                        url: 'controllers/check_email.php',
                        type: 'POST',
                        dataType: 'json',
                        async: true,
                        cache: false,
                        data: {string:string},
                        success:function (data) {

                            if(data.error){

                                alertMessage('#email', '.error-email', data.error);
                                error_email = false;
                            }else{
                                deleteMessage('.error-email');
                                error_email = true;
                            }
                        }
                    });

                }
            }
        }

    });

    $(document).on('keyup', '#password', function () {

        let pass = $(this).val();

        if(pass === ''){
            $('.error-password').html('Field password is required').show('slow');
            error_pass = false;
        }else if(pass.length < 8){
            $('.error-password').html('Password must be at least 8 characters long').show('slow');
            error_pass = false;
        }else {
            deleteMessage('.error-password');
            error_pass = true;
        }
    });

    /*$(document).on('submit', '#form-login', function () {

        let form = $(this);
        let email = form.find('#email').val();
        let pass = form.find('#password').val();


        if(error_email === false || error_pass === false){

            if(email === ''){
                requiredMessage('.error-email', 'Field email or phone is required');
            }

            if(pass === ''){
                requiredMessage('.error-password', 'Field password is required');
            }
            return false;
        }

    });*/
});


//SCRIPT JAVASCRIPT
   // SHOW AND HIDE PASSWORD FOR USER

    const showHidePassword = (input) => {

        let getInput = document.querySelector(input),
            queryAllFaEye = document.querySelectorAll('.input-group-prepend .fa-eye'),
            queryAllFaEyeSlash = document.querySelectorAll('.input-group-prepend .fa-eye-slash');
        const attr = getInput.getAttribute('type');

        if(attr === 'password'){

            getInput.setAttribute('type', 'text');
            for(let i = 0; i < queryAllFaEye.length; i++){
                queryAllFaEye[i].classList.add('d-none');
                queryAllFaEyeSlash[i].classList.remove('d-none');
            }
        }else{

            getInput.setAttribute('type', 'password');
            for(let i = 0; i < queryAllFaEye.length; i++) {
                queryAllFaEye[i].classList.remove('d-none');
                queryAllFaEyeSlash[i].classList.add('d-none');
            }
        }
        //alert(queryAll.length)
    };


