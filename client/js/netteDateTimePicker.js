(function ($) {
    $.timepicker.regional['cs'] = {
        timeOnlyTitle: 'Vyberte čas',
        timeText: 'Čas',
        hourText: 'Hodiny',
        minuteText: 'Minuty',
        secondText: 'Vteřiny',
        millisecText: 'Milisekundy',
        timezoneText: 'Časové pásmo',
        currentText: 'Nyní',
        closeText: 'Zavřít',
        timeFormat: 'H:m',
        amNames: ['dop.', 'AM', 'A'],
        pmNames: ['odp.', 'PM', 'P'],
        isRTL: false
    };
    $.timepicker.setDefaults($.timepicker.regional['cs']);

    $.datepicker.regional['cs'] = {
        closeText: 'Zavřít',
        prevText: '&#x3c;Předchozí',
        nextText: 'Následující&#x3e;',
        currentText: 'Nyní',
        monthNames: ['leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec'],
        monthNamesShort: ['led', 'úno', 'bře', 'dub', 'kvě', 'čer', 'čvc', 'srp', 'zář', 'říj', 'lis', 'pro'],
        dayNames: ['neděle', 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota'],
        dayNamesShort: ['ne', 'po', 'út', 'st', 'čt', 'pá', 'so'],
        dayNamesMin: ['ne', 'po', 'út', 'st', 'čt', 'pá', 'so'],
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['cs']);

})(jQuery);

$(document).ready(function () {
    //projdi vsechny inputy
    $('input').each(function (index) {
        //pokud ma input dateinput-type => jedna se o datum
        if ($(this).data('dateinput-type')) {
            switch ($(this).data('dateinput-type')) {
                case 'date':
                    $(this).datepicker();
                    break;
                case 'time':
                    $(this).timepicker({
                        showSecond: false,
                        timeFormat: 'HH:mm'
                    });
                    break;
                case 'timesec':
                    $(this).timepicker({
                        //timeFormat: 'HH:mm',
                        showSecond: true,
                        timeFormat: 'HH:mm:ss'
                    });
                    break;
                case 'datetime':
                    $(this).datetimepicker({
                        showSecond: false,
                        timeFormat: 'HH:mm'
                    });
                    break;
                case 'month':
                    $(this).datepicker({
                        dateFormat: 'MM yy'
                    });
                    break;
            }

        }
    });
});