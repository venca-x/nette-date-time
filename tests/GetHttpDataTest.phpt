<?php

declare(strict_types=1);

namespace Test;

use Nette\Forms\Form;
use Tester;
use Tester\Assert;
use VencaX;
use Nette;

require __DIR__ . '/bootstrap.php';

class GetHttpDataTest extends Tester\TestCase
{

    public function setUp()
    {
        VencaX\NetteDateTime\NetteDateTimePicker::register();
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_GET = $_POST = $_FILES = [];
    }

    public function testSomething()
    {
        Assert::true(true);
    }

    public function testMonth()
    {
        $form = new Form;

        $form->addDate('month', 'Month:', 'month')->setValue("10.1.2017");
        $form->addDate('month2', 'Month:', 'month')->setValue("1 2017");

        $form->addSubmit('send', 'Send');

        Assert::truthy($form->isSubmitted());
        Assert::true($form->isSuccess());
        Assert::same([], $form->getHttpData());

        $a = $form->getValues(true);
        Assert::equal("01 2017", $a["month"]->format("m Y"));
        Assert::equal("01 2017", $a["month2"]->format("m Y"));
    }

    public function testDateAndTime()
    {
        $form = new Form;

        $form->addDate('datetime', 'Date time:', 'datetime')->setValue("24.8.2017 15:42");
        $form->addDate('date', 'Date:', 'date')->setValue("25.8.2017");
        $form->addDate('time', 'Time:', 'time')->setValue("10:25");
        $form->addDate('timesec', 'Time sec:', 'timesec')->setValue("12:42:41");

        $form->addSubmit('send', 'Send');

        Assert::truthy($form->isSubmitted());
        Assert::true($form->isSuccess());

        $a = $form->getValues(true);

        Assert::same("24.08.2017 15:42", $a["datetime"]->format('d.m.Y H:i'));
        Assert::same("25.08.2017", $a["date"]->format('d.m.Y'));
        Assert::same("10:25", $a["time"]->format('H:i'));
        Assert::same("12:42:41", $a["timesec"]->format('H:i:s'));
    }
}

$test = new GetHttpDataTest();
$test->run();
