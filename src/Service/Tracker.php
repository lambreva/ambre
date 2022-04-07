<?php

/**
 * Copyright © Amazing AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Amazing\AmbreModule\Service;

use OxidEsales\Eshop\Application\Model\User as EshopModelUser;
use Amazing\AmbreModule\Model\GreetingTracker;
use Amazing\AmbreModule\Model\User as ModelUser;
use Amazing\AmbreModule\Service\Repository as RepositoryService;

/**
 * @extendable-class
 */
class Tracker
{
    /** @var RepositoryService */
    private $repository;

    public function __construct(RepositoryService $repository)
    {
        $this->repository = $repository;
    }

    public function updateTracker(EshopModelUser $user): void
    {
        $savedGreeting = $this->repository->getSavedUserGreeting($user->getId());

        /** @var ModelUser $user */
        if ($savedGreeting !== $user->getPersonalGreeting()) {
            /** @var GreetingTracker $tracker */
            $tracker = $this->repository->getTrackerByUserId($user->getId());
            $tracker->countUp();
        }
    }
}
