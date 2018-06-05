<?php

declare(strict_types=1);

namespace VencaX\NetteDateTime;

use Nette;
use Nette\Forms\Controls;
use Nette\Utils\DateTime;

class NetteDateTimePicker extends Controls\TextInput
{
	/** @var Type date and time formats */
	protected $type;

	/** @var DateTime */
	protected $valueDateTime;

	private $supportFormatsArray = [
		'datetime' => 'd.m.Y H:i',
		'date' => 'd.m.Y',
		'month' => 'm Y',
		'time' => 'H:i',
		'timesec' => 'H:i:s',
	];


	public static function register()
	{
		Nette\Forms\Container::extensionMethod('addDate', function (Nette\Forms\Container $form, $name, $label = null, $type = 'datetime') {
			$component = new NetteDateTimePicker($label, $type);
			$form->addComponent($component, $name);
			return $component;
		});
	}


	public function __construct($label, string $type)
	{
		if (!isset($this->supportFormatsArray[$type])) {
			throw new \InvalidArgumentException("addDate: invalid date type '$type' given.");
		}

		parent::__construct($label);
		$this->type = $type;
		$this->control->addClass('nette-date-time');
		$this->control->appendAttribute('autocomplete', 'off');
		$this->control->data('dateinput-type', $type);
	}


	public function getControl(): Nette\Utils\Html
	{
		$control = parent::getControl();
		$control->value = $this->value;
		return $control;
	}


	public function setValue($value)
	{
		if ($value != null) {
			if ($value instanceof DateTime) {
				$this->valueDateTime = $value;
			} else {
				//parse
				$this->valueDateTime = DateTime::createFromFormat($this->supportFormatsArray[$this->type], $value);

				if ($this->valueDateTime == null) {
					//default parser if is problem in first parser
					$this->valueDateTime = new DateTime($value);
				}
			}

			//value for input
			$this->value = $this->valueDateTime->format($this->supportFormatsArray[$this->type]);

		} else {
			$this->value = null;
		}

		return $this;
	}


	/**
	 * Value after submit form
	 * @return DateTime
	 */
	public function getValue()
	{
		if ($this->value == null) {
			//new value is null
			return null;
		} else {
			return $this->valueDateTime;
		}
	}
}
