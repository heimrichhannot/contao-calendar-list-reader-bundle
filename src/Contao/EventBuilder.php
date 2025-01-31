<?php

namespace HeimrichHannot\CalendarListReaderBundle\Contao;

use Contao\CalendarEventsModel;
use Contao\CoreBundle\Twig\Interop\ContextFactory;
use Contao\Events;
use Contao\FrontendTemplate;

class EventBuilder extends Events
{
    /**
     * @noinspection PhpMissingParentConstructorInspection
     */
    public function __construct()
    {
    }

    /**
     * @param array<string, mixed> $item
     */
    public function prepareItemData(array &$item): void
    {
        $model = CalendarEventsModel::findByPk($item['id']);
        if (!$model) {
            return;
        }

        $this->arrEvents = [];
        $this->addEvent($model, (int) $model->startTime, (int) $model->endTime, 0, (int) $model->endTime, (int) $model->pid);
        if (empty($this->arrEvents)) {
            return;
        }

        $events = $this->arrEvents[array_key_first($this->arrEvents)];
        $events = $events[array_key_first($events)];
        $item = array_merge(
            $item,
            $events[array_key_first($events)]
        );

        $template = new FrontendTemplate();
        $template->setData($item);

        $contextFactory = new ContextFactory();
        $item = $contextFactory->fromContaoTemplate($template);
    }

    protected function compile(): void
    {
    }
}
