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

    /**
     * @param array<string, mixed> $item
     * @return void
     */
    public function prepareItemData(array &$item): void
    {
        $model = CalendarEventsModel::findByPk($item['id']);
        if (!$model) {
            return;
        }

        $this->arrEvents = [];
        $this->addEvent($model, (int)$model->startTime, (int)$model->endTime, 0, (int)$model->endTime, (int)$model->pid);
        if (empty($this->arrEvents)) {
            return;
        }

        $events = $this->arrEvents[array_key_first($this->arrEvents)];
        $item   = array_merge(
            $item,
            $events[array_key_first($events)]
        );
    }

    protected function compile(): void
    {
    }
}