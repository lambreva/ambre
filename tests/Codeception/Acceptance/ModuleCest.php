<?php

/**
 * Copyright © Amazing AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Amazing\AmbreModule\Tests\Codeception\Helper;

use OxidEsales\Codeception\Module\Translation\Translator;
use Amazing\AmbreModule\Tests\Codeception\AcceptanceTester;

/**
 * @group amz_ambre
 * @group amz_ambre_module
 */
final class ModuleCest
{
    public function _after(AcceptanceTester $I): void
    {
        $I->setModuleActive();
    }

    public function testCanDeactivateModule(AcceptanceTester $I): void
    {
        $I->wantToTest('that deactivating the module does not destroy the shop');

        $I->openShop();
        $I->waitForText(Translator::translate('HOME'));
        $I->see(Translator::translate('OEMODULETEMPLATE_GREETING'));

        $I->setModuleActive(false);
        $I->reloadPage();

        $I->waitForText(Translator::translate('HOME'));
        $I->dontSee(Translator::translate('OEMODULETEMPLATE_GREETING'));
    }
}
