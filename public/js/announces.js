$(function () {



    const paginateActive = () => {

        let uri = window.location.href;
        const page = $('.count-page').attr('value');

        let detach = uri.split('page=');
        const i = detach[1]*2;

        if(detach[1] === page){

           $('.count-page').find('.after').addClass('disabled');

        }else if(detach[1] == 1){

            $('.count-page').find('.before').addClass('disabled');
        }
        $("li:nth-child("+i+")").addClass('active');
    };

    paginateActive();
});