$(document).ready(function(){

    /**
     * remove exercise
     * */
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
                progressJs().start().autoIncrease(50, 200);
                $.post({
                    url: '/trainings/delete',
                    data: {'id': id},
                    success: function(responsive) {
                        swal('Тренеровка удалена', '', 'success');
                        $('#training-'+id).remove();
                        progressJs().end();
                    },
                    error: function(responsive) {
                        swal('При удалении произошла ошика', '', 'error');
                        progressJs().end();
                     }
                });

            } else {
                swal('Отменено', '', 'error');
            }
        });
    });
    /**
     * end remove
     * */

    /**
    * create new trainings
    * */
    var l = Ladda.create(document.querySelector('#create-new-trainings'));
    $('body').on('beforeSubmit', 'form#create-training-form', function () {
        var form = $(this);

        if (form.find('.has-error').length) {
            return false;
        }

        l.start();
    });
    /**
     * end create
     * */
});