<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Service\Cart;

use Codeception\Actor;
use Generated\Shared\Transfer\ItemTransfer;

/**
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class CartServiceTester extends Actor
{
    use _generated\CartServiceTesterActions;

    /**
     * @param string $sku
     *
     * @return \Generated\Shared\Transfer\ItemTransfer
     */
    public function createItemTransfer(string $sku): ItemTransfer
    {
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);

        return $itemTransfer;
    }
}
