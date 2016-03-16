$(document).ready(function () {

    var input = $('.field-trainingform-exercise').html();

    $('.add-new-exercise').on('click', function() {

        $('.field-trainingform-exercise').append(input);
    })
});