<?php

namespace Test;


use Nette\Forms\Form;
use VencaX;
use Tester;
use Tester\Assert;

$container = require __DIR__ . '/bootstrap.php';

class ExtensionTest extends Tester\TestCase
{

    /**
     * Nette\Forms\Form
     */
    private $form;

    function setUp()
    {
        VencaX\NetteDateTime\NetteDateTimePicker::register();
        $this->form = new Form;
    }

    function testRegistrationExtension()
    {
        $dateTimeInput = $this->form->addDate("datetime", "Date time:", "datetime");
        Assert::same('<input type="text" name="datetime" class="nette-date-time" data-dateinput-type="datetime" id="frm-datetime">', (string)$dateTimeInput->getControl());

        $dateInput = $this->form->addDate("date", "Date:", "date");
        Assert::same('<input type="text" name="date" class="nette-date-time" data-dateinput-type="date" id="frm-date">', (string)$dateInput->getControl());

        $monthInput = $this->form->addDate("month", "Month:", "month");
        Assert::same('<input type="text" name="month" class="nette-date-time" data-dateinput-type="month" id="frm-month">', (string)$monthInput->getControl());

        $timeInput = $this->form->addDate("time", "Time:", "time");
        Assert::same('<input type="text" name="time" class="nette-date-time" data-dateinput-type="time" id="frm-time">', (string)$timeInput->getControl());

        $timesecInput = $this->form->addDate("timesec", "Time sec:", "timesec");
        Assert::same('<input type="text" name="timesec" class="nette-date-time" data-dateinput-type="timesec" id="frm-timesec">', (string)$timesecInput->getControl());
    }

    function testRegistrationExtensionValue()
    {
        $dateTimeInput = $this->form->addDate("datetime", "Date time:", "datetime")->setValue(date("d.m.Y H:i"));
        Assert::same('<input type="text" name="datetime" class="nette-date-time" data-dateinput-type="datetime" id="frm-datetime" value="' . date("d.m.Y H:i") . '">', (string)$dateTimeInput->getControl());

        $dateInput = $this->form->addDate("date", "Date:", "date")->setValue(date("d.m.Y"));
        Assert::same('<input type="text" name="date" class="nette-date-time" data-dateinput-type="date" id="frm-date" value="' . date("d.m.Y") . '">', (string)$dateInput->getControl());

        $monthInput = $this->form->addDate("month", "Month:", "month")->setValue(date("d.m.Y"));
        Assert::same('<input type="text" name="month" class="nette-date-time" data-dateinput-type="month" id="frm-month" value="' . date("m Y") . '">', (string)$monthInput->getControl());

        $timeInput = $this->form->addDate("time", "Time:", "time")->setValue(date("H:i"));
        Assert::same('<input type="text" name="time" class="nette-date-time" data-dateinput-type="time" id="frm-time" value="' . date("H:i") . '">', (string)$timeInput->getControl());

        $timesecInput = $this->form->addDate("timesec", "Time sec:", "timesec")->setValue(date("H:i:s"));
        Assert::same('<input type="text" name="timesec" class="nette-date-time" data-dateinput-type="timesec" id="frm-timesec" value="' . date("H:i:s") . '">', (string)$timesecInput->getControl());
    }

}

$test = new ExtensionTest($container);
$test->run();