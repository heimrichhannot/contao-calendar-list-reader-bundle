<?php

namespace HeimrichHannot\CalendarListReaderBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotCalendarListReaderBundle extends Bundle
{
    public function getPath()
    {
        return \dirname(__DIR__);
    }

}