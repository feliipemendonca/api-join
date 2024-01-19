import httpRequest from './api/httpRequest';
import './bootstrap';
import helper from './helper';

var selectors = {
    zip: 'input[name=zip]',
    state: 'input[name=state]',
    city: 'input[name=city]',
    address: 'input[name=address]',
    number: 'input[name=number]',
    complement: 'input[name=complement]',
    district: 'input[name=district]',
    hour: '.time',
    cnpj: '.cnpj',
    cpf: '.cpf',
    rg: '.rg',
    phone: '.phone',
    fixo: '.fixo',
    amount: '.amount',
    addFile: '.add_file',
    removeFile: '.remove_file',
    typePrice: '.type_price_id',
    digits: '.digits',
    previewImage: '.preview-image'
};

$(document).ready( _ =>  {

    // Service zip
    $(selectors.zip).blur( _=> {
        let zip = $(selectors.zip).val().replace(/\D/g, '');
        let validate = /^[0-9]{8}$/;;

        if(validate.test(zip)) {
            $.getJSON(`https://viacep.com.br/ws/${zip}/json/?callback=?`, (data) => {
                $(selectors.state).val(data.uf);
                $(selectors.city).val(data.localidade);
                $(selectors.district).val(data.bairro);
                $(selectors.address).val(data.logradouro);
                $(selectors.district).val(data.bairro);
            });
        }
    });

    //Masks
    $(selectors.cnpj).mask('00.000.000/0000-00');
    $(selectors.zip).mask('00.000-000');
    $(selectors.cpf).mask('000.000.000-00');
    $(selectors.rg).mask('000.000.000');
    $(selectors.phone).mask('(00) 0 0000-0000');
    $(selectors.fixo).mask('(00) 0000-0000');
    $(selectors.amount).mask('R$ #.##0,00', {reverse: true});
    $(selectors.hour).mask('00:00', {reverse: true});
    $(selectors.digits).mask('#0', {reverse: true});

    //End Mask

    // Add Input File
    $(selectors.addFile).on('click', (event) => {
        const _this = $(event.currentTarget).data('selector');
        helper.formInput(_this);
    });

    $(selectors.removeFile).click((event) => {
        const _this = $(event.currentTarget).data('id');
        const url = `/dashboard/passeios/${_this}/removefile`;
        const parameters = {
            id: _this,
            _token: $('meta[name="csrf-token"]').attr('content'),
            _method: "DELETE"
        }

        httpRequest.destroy(url, parameters).then((response) => {
            if(response) {
                $(`.file_${_this}`).remove();
            }
        });
    });

    $(selectors.previewImage).on('change', (e) => {
        helper.loadFile(e)
    })
});
