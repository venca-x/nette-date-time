<?php

namespace Nette\Forms;

use Nette\Forms\Controls;

class NetteDateTime extends Controls\TextInput
{
    /** @var Type time to format */
    protected $type;
    protected $value = NULL;
    private $aFormats = array(
        "datetime" => 'd.m.Y H:i',
        "date" => 'd.m.Y',
        "month" => 'm Y',
        "time" => 'H:i:s',
    );

    public static function register()
    {
        \Nette\Forms\Container::extensionMethod( 'addDate', function ( \Nette\Forms\Container $form, $name, $label = null, $type = 'datetime' )
        {
            $component = new NetteDateTime( $label, $type );
            $form->addComponent( $component, $name );
            return $component;
        } );
    }

    public function __construct( $label = NULL, $type )
    {
        if ( !isset( $this->aFormats[$type] ) )
        {
            throw new \InvalidArgumentException( "addDate: invalid date type '$type' given." );
        }

        parent::__construct( $label );
        $this->type = $type;
        $this->control->addClass( 'nette-date-time' );
        $this->control->data( 'dateinput-type', $type );
    }

    public function getControl()
    {
        $control = parent::getControl();
        $control->value = $this->value;
        return $control;
    }

    public function setValue( $value )
    {
        if( $value != NULL )
        {
            $this->value = date( $this->aFormats[ $this->type ], strtotime($value));
        }
        else
        {
            $this->value = NULL;
        }
        return $this;
    }

    public function getValue()
    {
        return date( 'Y-m-d H:i:s', strtotime( $this->value ) );
    }

}
