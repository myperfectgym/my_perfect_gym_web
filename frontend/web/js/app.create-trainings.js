$(document).ready(function () {

    var content = $('#exercise-touch').html();

    $('#add-touch-button').click(function(){
        $('#exercise-touch').append(content);
    });

    $('body').on('beforeSubmit', 'form#create-new-exercise-form', function () {
        var form = $(this);

        if (form.find('.has-error').length) {
            return false;
        }
        $.post({
            url: '/trainings/create-new-exercise',
            data: form.serialize(),
            success: function (response) {
                console.log(response);
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
});