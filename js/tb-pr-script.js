const newParish = function(choosen){
    if(choosen == 'new' || choosen == 'new-parish')
    {
        $('.new-parish').removeClass('d-none');
        if(choosen == 'new-parish')
        {
            $('#parish-city-new-input').val($('#parish-city-input option:selected').text());
        }
    }else
    {
        $('.new-parish').addClass('d-none');
    }
}

const updateTransferData = function()
{
    $('#name-in-transfer-title').html($('#name-input').val() + ' ' + $('#last-name-input').val());
}

jQuery(document).ready(function($) {
    $('#birth-date-input').on('change', function(){
        let date = new Date($('#birth-date-input').val());
        let adultDate = date;
        adultDate.setFullYear(date.getFullYear() + 18);
        let start = new Date();
        start.setMonth(6);
        start.setDate(25);
        if(adultDate > start)
        {
            $('.if-under-age').removeClass('d-none');
        }else{
            $('.if-under-age').addClass('d-none');
        }
    });

    $('.parishes').addClass('d-none');
    const firstCityId = $('#parish-city-input option:first').val();
    const firstCityClass = '.'+ firstCityId + '-city';
    $(firstCityClass).removeClass('d-none');
    $('#parish-input').val($(firstCityClass+':first').val());

    $('#parish-city-input').on('change', function(){
        let choosenCity = $('#parish-city-input').val();
        let className = '.' + choosenCity + "-city";
        $('.parishes').addClass('d-none');
        $(className).removeClass('d-none');
        $('#parish-input').val($(className+':first').val());
        newParish(choosenCity);
    });
    $('#parish-input').on('change', function(){
        let parishChoosen = $('#parish-input').val();
        newParish(parishChoosen);
    });

    $('.new-stage-button').on('click', function(){
        $('#to-repeat').clone().insertAfter(".to-repeat:last");
        $('.remove-stage-button').removeClass('d-none').on('click', function(){
            $(this).closest(".to-repeat").remove();
            if($('.to-repeat').length < 2)
            {
                $('.remove-stage-button').addClass('d-none');
            }
        });
    });

    $('#i-want-t-shirt').on('change', function(){
        if($('#i-want-t-shirt').is(":checked"))
        {
            $('.t-shirt-size').removeClass('d-none');
        }else{
            $('.t-shirt-size').addClass('d-none');
        }
    });

    $('#name-input').on('change', updateTransferData);
    $('#last-name-input').on('change', updateTransferData);

    let today = new Date();
    let dd = today.getDate();
    let mm = today.getMonth() + 1;
    let yyyy = today.getFullYear();

    if(dd < 10)
    {
        dd = '0' + dd;
    }

    if(mm < 10)
    {
        mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;
    $('#birth-date-input').attr("max", today);

    $('.pilgrimage-activation').on('click', ()=>{
        let endpoint = document.querySelector('link[rel="https://api.w.org/"%5D').href;
        console.log(endpoint);
    });
});