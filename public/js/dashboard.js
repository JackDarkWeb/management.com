$(function () {

    $('.logout').click(function (e) {
        e.preventDefault();
        window.location = '/admin/logout';
    });


    $(document).on('click', '#answer', function (e) {
        let nbr = $(this).attr('value');
        $('.form-'+nbr).removeClass('d-none').siblings('.form-'+nbr).addClass('d-none');

        $.ajax({
            url:'/admin/show',
            method:'POST',
            dataType:'json',
            async: true,
            cache:false,
            data:{nbr:nbr},
            success:function (response) {

                if(response){

                    $('.first-name-'+nbr).val(response.first);
                    $('.last-name-'+nbr).val(response.last);
                    $('.email-'+nbr).val(response.email);
                    $('.subject-'+nbr).val(response.subject);
                }
            }
        });
    });


    $(document).on('click', '#delete', function (e) {
        e.preventDefault();

        if(this.id === 'delete'){
            alert(this.id)
        }

    });



});