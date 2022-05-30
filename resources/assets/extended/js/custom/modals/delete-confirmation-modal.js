"use strict";

$(document).ready(function(){

    $(document).on('click', '.open-delete-confirmation-modal', function(e){

        e.preventDefault();

        var url = $(this).data('url');

        $('#delete-confirmation-dynamic-content').html('');
        $('#delete-confirmation-modal-loader').show();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        }).done(function(data){
            $('#delete-confirmation-dynamic-content').html();
            $('#delete-confirmation-dynamic-content').html(data);
            $('#delete-confirmation-modal-loader').hide();
        }).fail(function(){
            $('#delete-confirmation-dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Algo deu errado. Tente novamente mais tarde...');
            $('#delete-confirmation-modal-loader').hide();
        });

    });

    $("#delete-confirmation-modal-submit").click(function() {
        $(this).prop("disabled", true);
        $('#delete-confirmation-modal-form').submit();
    });

});
