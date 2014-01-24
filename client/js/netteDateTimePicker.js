( function( $ )
{
    $.timepicker.regional['cs'] = {
        timeOnlyTitle: 'Vyberte èas',
        timeText: 'Èas',
        hourText: 'Hodiny',
        minuteText: 'Minuty',
        secondText: 'Vteøiny',
        millisecText: 'Milisekundy',
        timezoneText: 'Èasové pásmo',
        currentText: 'Nyní',
        closeText: 'Zavøít',
        timeFormat: 'H:m',
        amNames: ['dop.', 'AM', 'A'],
        pmNames: ['odp.', 'PM', 'P'],
        isRTL: false
    };
    $.timepicker.setDefaults( $.timepicker.regional['cs'] );

    $.datepicker.regional['cs'] = {
        closeText: 'Zavøít',
        prevText: '&#x3c;Pøedchozí',
        nextText: 'Následující&#x3e;',
        currentText: 'Nyní',
        monthNames: ['leden', 'únor', 'bøezen', 'duben', 'kvìten', 'èerven', 'èervenec', 'srpen', 'záøí', 'øíjen', 'listopad', 'prosinec'],
        monthNamesShort: ['led', 'úno', 'bøe', 'dub', 'kvì', 'èer', 'èvc', 'srp', 'záø', 'øíj', 'lis', 'pro'],
        dayNames: ['nedìle', 'pondìlí', 'úterý', 'støeda', 'ètvrtek', 'pátek', 'sobota'],
        dayNamesShort: ['ne', 'po', 'út', 'st', 'èt', 'pá', 'so'],
        dayNamesMin: ['ne', 'po', 'út', 'st', 'èt', 'pá', 'so'],
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults( $.datepicker.regional['cs'] );

} )( jQuery );

$( document ).ready( function()
{
    //projdi vsechny inputy
    $( 'input' ).each( function( index )
    {
        //pokud ma input dateinput-type => jedna se o datum
        if ( $( this ).data( 'dateinput-type' ) )
        {
            switch ($( this ).data( 'dateinput-type' ))
            {
                case 'date':
                    $( this ).datepicker();
                    break;
                case 'time':
                    $( this ).timepicker( {
                        //timeFormat: 'HH:mm',
                        showSecond: true,
                        timeFormat: 'HH:mm:ss'
                    } );

                    break;
                case 'datetime':
                    $( this ).datetimepicker( {
                        showSecond: false,
                        timeFormat: 'HH:mm'
                    } );
                    break;
                case 'month':
                    $( this ).datepicker( {
                        dateFormat: 'MM yy'
                    } );
                    break;
            }

        }
    } );
} );