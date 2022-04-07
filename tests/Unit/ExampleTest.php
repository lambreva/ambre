<?php

/**
 * Copyright © Amazing AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Amazing\AmbreModule\Tests\Unit;

use OxidEsales\Eshop\Application\Controller\StartController as EshopStartController;
use OxidEsales\TestingLibrary\UnitTestCase;

/*
 * Unit
 */
final class ExampleTest extends UnitTestCase
{
    public function testControllerRender(): void
    {
        $controller = $this->getMockBuilder(EshopStartController::class)
            ->getMock();
        $controller->method('render')
            ->willReturn('mock.tpl');

        $this->assertSame('mock.tpl', $controller->render());
    }
}
