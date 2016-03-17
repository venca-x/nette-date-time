<?php
namespace Test;

use Nette;
use Nette\Forms\Form;
use Tester;
use Tester\Assert;

$container = require __DIR__ . '/bootstrap.php';

class ExtensionTest extends Tester\TestCase
{

    function setUp()
    {
    }

    function testRegistrationExtension()
    {
        Nette\Forms\NetteDateTime::register();

        $form = new Form;

        $dateTimeInput = $form->addDate("datetime", "Date time:", "datetime" );
        Assert::same('<input type="text" name="datetime" class="nette-date-time" data-dateinput-type="datetime" id="frm-datetime">', (string) $dateTimeInput->getControl());

        $dateInput = $form->addDate("date", "Date:", "date" );
        Assert::same('<input type="text" name="date" class="nette-date-time" data-dateinput-type="date" id="frm-date">', (string) $dateInput->getControl());

        $monthInput = $form->addDate("month", "Month:", "month" );
        Assert::same('<input type="text" name="month" class="nette-date-time" data-dateinput-type="month" id="frm-month">', (string) $monthInput->getControl());

        $timeInput = $form->addDate("time", "Time:", "time" );
        Assert::same('<input type="text" name="time" class="nette-date-time" data-dateinput-type="time" id="frm-time">', (string) $timeInput->getControl());

        $timesecInput = $form->addDate("timesec", "Time sec:", "timesec" );
        Assert::same('<input type="text" name="timesec" class="nette-date-time" data-dateinput-type="timesec" id="frm-timesec">', (string) $timesecInput->getControl());
    }

}

$test = new ExtensionTest($container);
$test->run();