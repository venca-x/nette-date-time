<?php

declare(strict_types=1);

namespace Test;

use Nette\Forms\Form;
use Tester;
use Tester\Assert;
use VencaX;

require __DIR__ . '/bootstrap.php';

class ExceptionTest extends Tester\TestCase
{
	/**
	 * Nette\Forms\Form
	 */
	private $form;


	public function setUp()
	{
		VencaX\NetteDateTime\NetteDateTimePicker::register();
		$this->form = new Form;
	}


	public function testBadType()
	{
		Assert::exception(function () {
			$this->form->addDate('datetime', 'Date time:', 'xxx');
		}, \Exception::class);
	}


	public function testBadValue()
	{
		Assert::exception(function () {
			$this->form->addDate('datetime', 'Date time:', 'datetime')->setValue('xxx');
		}, \Exception::class);
	}
}

$test = new ExceptionTest();
$test->run();
