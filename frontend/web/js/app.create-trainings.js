$(document).ready(function () {

    var content = $('#exercise-touch').html();
    var l = Ladda.create(document.querySelector('#create-new-exercise'));

    $('#add-touch-button').click(function(){
        $('#exercise-touch').append(content);
    });

    $('body').on('beforeSubmit', 'form#create-new-exercise-form', function () {
        var form = $(this);

        $('.select2').removeClass('has-error');

        if (form.find('.has-error').length) {
            return false;
        }

        l.start();
        $.post({
            url: '/trainings/create-new-exercise',
            data: form.serialize(),
            success: function (response) {

                l.remove();
                $('.reset').val('');
                $('#modal-close').trigger('click');

                $('.touch').each(function(index) {
                    if (index != 0) {
                        $(this).remove();
                    }
                });

                $('#created-touch').append(response);

            }
        });
        return false;
    });

    $('.remove').click(function(){
        var id = $(this).data('id');
        swal({
            title: 'Вы уверены',
            text: 'Упражнение будет удалено',
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
                    url: '/trainings/delete-touch',
                    data: {'id': id},
                    success: function(responsive) {
                        swal('Упражнение удалено', '', 'success');
                        $('#exercise-'+id).remove();
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