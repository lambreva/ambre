<?php

/**
 * Copyright © Amazing AG. All rights reserved.
 * See LICENSE file for license details.
 */

#AfterModelUpdateEvent

declare(strict_types=1);

namespace Amazing\AmbreModule\Subscriber;

use OxidEsales\Eshop\Application\Model\User as EshopModelUser;
use OxidEsales\EshopCommunity\Internal\Framework\Event\AbstractShopAwareEventSubscriber;
use OxidEsales\EshopCommunity\Internal\Transition\ShopEvents\BeforeModelUpdateEvent;
use Amazing\AmbreModule\Service\Tracker;
use Amazing\AmbreModule\Traits\ServiceContainer;

/**
 * @extendable-class
 */
class BeforeModelUpdate extends AbstractShopAwareEventSubscriber
{
    use ServiceContainer;

    public function handle(BeforeModelUpdateEvent $event): BeforeModelUpdateEvent
    {
        $payload = $event->getModel();

        if (is_a($payload, EshopModelUser::class)) {
            $this->getServiceFromContainer(Tracker::class)
                ->updateTracker($payload);
        }

        return $event;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeModelUpdateEvent::class => 'handle',
        ];
    }
}
