$(function () {

    let error_first_name = false, error_last_name = false, error_message = false,
        error_subject = false, error_email = false;

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




    $(document).on('blur', '#first-name', function () {
        let first_name = $(this).val();
        let filter = /^[a-zA-Zéèêëíìîïñóòôöõúùûüýÿæ -]+$/i;

        if(first_name === ''){
            alertMessage(this, '.error-first-name', 'First name is required');
            error_first_name = false;
        }else if(!first_name.match(filter)){
            alertMessage(this, '.error-first-name', 'Your first name contains characters  not allowed');
            error_first_name = false;
        }else if(first_name.length < 3){
            alertMessage(this, '.error-first-name', 'First name must be at least 3 characters long');
            error_first_name = false;
        }else{
            deleteMessage('.error-first-name');
            error_first_name = true;
        }
    });

    $(document).on('blur', '#last-name', function () {
        let last_name = $(this).val();
        let filter = /^[a-zA-Zéèêëíìîïñóòôöõúùûüýÿæ -]+$/i;

        if(last_name === ''){
            alertMessage(this, '.error-last-name', 'First name is required');
            error_last_name = false;
        }else if(!last_name.match(filter)){
            alertMessage(this, '.error-last-name', 'Your first name contains characters  not allowed');
            error_last_name = false;
        }else if(last_name.length < 3){
            alertMessage(this, '.error-last-name', 'First name must be at least 3 characters long');
            error_last_name = false;
        }else{
            deleteMessage('.error-last-name');
            error_last_name = true;
        }
    });

    $(document).on('blur', '#subject', function () {
        let subject = $(this).val();
        let filter = /^[a-zA-Zéèêëíìîïñóòôöõúùûüýÿæ -]+$/i;

        if(subject === ''){
            alertMessage(this, '.error-subject', 'Subject is required');
            error_subject = false;
        }else if(!subject.match(filter)){
            alertMessage(this, '.error-subject', 'Your Subject  contains characters  not allowed');
            error_subject = false;
        }else if(subject.length < 3){
            alertMessage(this, '.error-subject', 'Subject  must be at least 3 characters long');
            error_subject = false;
        }else{
            deleteMessage('.error-subject');
            error_subject = true;
        }
    });

    $(document).on('keyup', '#message', function () {

        let message = $(this).val();
        if(message === ''){
            borderColorMessage('#message');
            error_message = false;
        }else if(message.length < 10){
            borderColorMessage('#message');
            error_message = false;
        }else{
            $(this).removeAttr('style');
            error_message = true;
        }
    });




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
                    deleteMessage('.error-email');
                    error_email = true;
                }
            }
        }

    });



    $(document).on('submit', '#form-contact', function () {

        let form = $(this),
         first_name  = form.find('#first-name').val(),
         last_name   = form.find('#last-name').val(),
         email       = form.find('#email').val(),
         subject     = form.find('#subject').val(),
         message     = form.find('#message').val();


        const ajax = true;


        if(error_first_name === false || error_last_name === false || error_email === false || error_message === false || error_subject === false){


            if(first_name === ''){
                requiredMessage('.error-first-name', 'First name is required');
            }
            if(last_name === ''){
                requiredMessage('.error-last-name', 'Last name is required');
            }

            if(email === ''){
                requiredMessage('.error-email', 'Email is required');
            }

            if(subject === ''){
                requiredMessage('.error-subject', 'Subject is required');
            }

            if(message === ''){
                borderColorMessage('#message');
            }
            return false;
        }else{

            $.ajax({
                url:'/contact',
                method:'POST',
                dataType:'json',
                async: true,
                cache:false,
                data:{first_name:first_name,last_name:last_name,message:message,email:email,subject:subject,ajax:ajax},
                success:function (response) {

                    if(response.error === false){

                        $('.result').html(response.message);

                    }else{
                        $('.result').html(response.message);
                        $('#form-contact').find('#last-name, #message, #email, #subject, #first-name').val('');
                    }
                },
                error: function (resp, status, error) {
                    $('.result').html(error);
                    //console.log(resp);
                },
            });


            return  false;
        }

    });
});