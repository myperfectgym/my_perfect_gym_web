$(document).ready(function(){

    $('.remove').click(function(){
        var id = $(this).data('id');
        swal({
            title: 'Вы уверены',
            text: 'Тренеровка будет удалена',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Да, удалить',
            cancelButtonText: 'Нет',
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {

                $.post({
                    url: '/trainings/delete',
                    data: {'id': id},
                    success: function(responsive) {
                        swal('Тренеровка удалена', '', 'success');
                        $('#training-'+id).remove();
                    },
                    error: function(responsive) {
                        swal('При удалении произошла ошика', '', 'error');
                     }
                });

            } else {
                swal('Отменено', '', 'error');
            }
        });
    });
});