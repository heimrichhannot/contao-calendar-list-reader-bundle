<?php

namespace HeimrichHannot\CalendarListReaderBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotCalendarListReaderBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
