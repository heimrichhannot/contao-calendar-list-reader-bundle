<?php

namespace HeimrichHannot\CalendarListReaderBundle\EventListener;

use Contao\CalendarEventsModel;
use Contao\StringUtil;
use HeimrichHannot\CalendarListReaderBundle\Contao\EventBuilder;
use HeimrichHannot\ListBundle\Event\ListBeforeRenderItemEvent;
use HeimrichHannot\ReaderBundle\Event\ReaderBeforeRenderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CalendarListener implements EventSubscriberInterface
{
    public function __invoke(ListBeforeRenderItemEvent $event): void
    {
        $eventBuilder = new EventBuilder();
        $item = $event->getTemplateData();
        $eventBuilder->prepareItemData($item);
        $event->setTemplateData($item);
    }

    public static function getSubscribedEvents(): array
    {
        $events = [];
        if (class_exists(ListBeforeRenderItemEvent::class)) {
            $events[ListBeforeRenderItemEvent::NAME] = '__invoke';
        }

        if (class_exists(ReaderBeforeRenderEvent::class)) {
            $events[ReaderBeforeRenderEvent::NAME] = '__invoke';
        }

        return $events;
    }
}