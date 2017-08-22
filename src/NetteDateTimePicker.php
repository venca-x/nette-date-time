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
	protected $value;
	private $supportFormatsArray = [
		'datetime' => 'd.m.Y H:i',
		'date' => 'd.m.Y',
		'month' => 'm Y',
		'time' => 'H:i',
		'timesec' => 'H:i:s',
	];


	public static function register()
	{
		\Nette\Forms\Container::extensionMethod('addDate', function (\Nette\Forms\Container $form, $name, $label = null, $type = 'datetime') {
			$component = new NetteDateTimePicker($label, $type);
			$form->addComponent($component, $name);
			return $component;
		});
	}


	public function __construct(string $label = null, string $type)
	{
		if (!isset($this->supportFormatsArray[$type])) {
			throw new \InvalidArgumentException("addDate: invalid date type '$type' given.");
		}

		parent::__construct($label);
		$this->type = $type;
		$this->control->addClass('nette-date-time');
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
			$this->value = date($this->supportFormatsArray[$this->type], strtotime($value));
		} else {
			$this->value = null;
		}
		return $this;
	}


	/**
	 * @return DateTime
	 */
	public function getValue()
	{
		return new DateTime($this->value);
	}
}