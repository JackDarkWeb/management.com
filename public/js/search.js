$(function () {


       const input = $('#form-search').find('#search');
       $(document).on('keyup', input, function () {
           search();
       });


    const search = () => {

           let string = input.val();
           let output = $('#form-search').find('ul');

           if(string === ''){
               output.addClass('d-none');
           }else{
               $.ajax({
                   url: 'controllers/search.php',
                   type: 'POST',
                   dataType: 'json',
                   async: true,
                   cache: false,
                   data: {string:string},
                   success:function (response) {

                       if(response){

                           output.removeClass('d-none');
                           output.html(response);
                       }
                   }
               });
           }
    }

});