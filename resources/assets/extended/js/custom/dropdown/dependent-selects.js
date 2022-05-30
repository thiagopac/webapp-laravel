"use strict";
/* jshint esversion: 8 */

let firstSelect = $(`select[data-select-dependent='true'][data-select-order='${1}']`);

let call = (url, element) => {

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json'
    }).done(function(data){
        let selectFields = $(element).data('select-fields').split(',');
        $(element).empty();
        $(element).append(`<option>Selecione</option>`);

        data.map((item) => {

            let selected = $(element).data('value') === item[selectFields[0]] ? 'selected' : '';
            $(element).append(`<option value="${item[selectFields[0]]}" ${selected}>${item[selectFields[1]]}</option>`);

            selected === 'selected' ? $(element).trigger('change') : '';
            selected = '';
        });

    }).fail(function(){
        // console.log('erro: ', error);
    });
};

call(`../dependent-select/${$(firstSelect).data('select-model')}/${$(firstSelect).data('select-fields')}`, $(firstSelect));

$("select[data-select-dependent='true']").change(function() {
    let nextSelect = $(`select[name='${$(this).data('select-affect')}']`);
    call(`../dependent-select/${$(nextSelect).data('select-model')}/${$(nextSelect).data('select-fields')}/${$(nextSelect).data('select-field-link')}/${$(this).val()}/${$(nextSelect).data('select-orderby')}`, $(nextSelect));
});
