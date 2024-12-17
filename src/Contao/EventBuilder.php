<?php

namespace HeimrichHannot\CalendarListReaderBundle\Contao;

use Contao\CalendarEventsModel;
use Contao\Events;

class EventBuilder extends Events
{
    /** @noinspection PhpMissingParentConstructorInspection */
    public function __construct()
    {
    }

    public function prepareItemData(array &$item): void
    {
        $model = CalendarEventsModel::findByPk($item['id']);
        if (!$model) {
            return;
        }

        $this->arrEvents = [];
        $this->addEvent($model, $model->startTime, $model->endTime, 0, $model->endTime, $model->pid);
        $item = array_merge(
            $item,
            $this->arrEvents[array_key_first($this->arrEvents)][array_key_first($this->arrEvents[array_key_first($this->arrEvents)])]
        );
    }

    protected function compile()
    {
    }
}