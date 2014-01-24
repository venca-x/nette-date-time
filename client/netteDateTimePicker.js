( function( $ )
{
    $.timepicker.regional['cs'] = {
        timeOnlyTitle: 'Vyberte �as',
        timeText: '�as',
        hourText: 'Hodiny',
        minuteText: 'Minuty',
        secondText: 'Vte�iny',
        millisecText: 'Milisekundy',
        timezoneText: '�asov� p�smo',
        currentText: 'Nyn�',
        closeText: 'Zav��t',
        timeFormat: 'H:m',
        amNames: ['dop.', 'AM', 'A'],
        pmNames: ['odp.', 'PM', 'P'],
        isRTL: false
    };
    $.timepicker.setDefaults( $.timepicker.regional['cs'] );

    $.datepicker.regional['cs'] = {
        closeText: 'Zav��t',
        prevText: '&#x3c;P�edchoz�',
        nextText: 'N�sleduj�c�&#x3e;',
        currentText: 'Nyn�',
        monthNames: ['leden', '�nor', 'b�ezen', 'duben', 'kv�ten', '�erven', '�ervenec', 'srpen', 'z���', '��jen', 'listopad', 'prosinec'],
        monthNamesShort: ['led', '�no', 'b�e', 'dub', 'kv�', '�er', '�vc', 'srp', 'z��', '��j', 'lis', 'pro'],
        dayNames: ['ned�le', 'pond�l�', '�ter�', 'st�eda', '�tvrtek', 'p�tek', 'sobota'],
        dayNamesShort: ['ne', 'po', '�t', 'st', '�t', 'p�', 'so'],
        dayNamesMin: ['ne', 'po', '�t', 'st', '�t', 'p�', 'so'],
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