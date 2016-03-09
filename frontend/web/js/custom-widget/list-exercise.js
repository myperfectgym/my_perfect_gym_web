$(document).ready(function(){

    $('.remove').click(function(){

        var id = $(this).data('id');
        $.post(
            '/admin/exercise/delete',
            {id: id},
            function(data){
                console.log(data);
            }
        );
    });
});