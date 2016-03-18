$(document).ready(function () {

    var id = 1;

    $('.add-new-exercise').on('click', function() {

        $.post(
            '/trainings/ajax-exercise-chose',
            {"id": id},
            function(data) {

                $('#trainings-selects').append("<div class='form-group'>" +
                        "<div class='form-group'>" +
                            "<label class='col-md-2 control-label'>" +
                                "<label class='control-label' for='trainingform-exercise-'"+id+">" +
                                    "Exercise" +
                                "</label>" +
                            "</label>"+
                            "<div class='col-md-10'>"
                                +data+
                            "</div>" +
                        "</div>" +
                    "</div>");

                if ($('#trainingform-exercise-'+id).data('select2')) {
                    $('#trainingform-exercise-'+id).select2('destroy');
                }

                $.when($('#trainingform-exercise-'+id).select2(select2_5df7b16d)).done(
                    initS2Loading('trainingform-exercise-'+id,'s2options_d6851687'
                    )
                );

                id++;
            }
        );
    })
});