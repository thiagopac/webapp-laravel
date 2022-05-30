"use strict";

$(document).ready(function(){

    $(document).on('click', '.open-master-modal', function(e){

        e.preventDefault();

        var url = $(this).data('url');

        $('#master-dynamic-content').html('');
        $('#master-modal-loader').show();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
            .done(function(data){

                $('#master-dynamic-content').html();
                $('#master-dynamic-content').html(data);
                $('#master-modal-title').html($($.parseHTML(data)).filter(".modal-title-captured").html());
                $('#master-modal-footer').html($($.parseHTML(data)).filter(".modal-footer-captured").html());
                $('#master-modal-loader').hide();
            })
            .fail(function(){
                $('#master-dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Algo deu errado. Tente novamente mais tarde...');
                $('#master-modal-loader').hide();
            });
    });

    $("#master-modal-submit").click(function() {
        $(this).prop("disabled", true);
        $('#master-modal-form').submit();
    });

});


