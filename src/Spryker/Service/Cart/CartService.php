<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Cart;

use Generated\Shared\Transfer\ItemTransfer;
use Spryker\Service\Kernel\AbstractService;

/**
 * @method \Spryker\Service\Cart\CartServiceFactory getFactory()
 */
class CartService extends AbstractService implements CartServiceInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     * @param \Generated\Shared\Transfer\ItemTransfer $itemToCompare
     *
     * @return bool
     */
    public function doItemsMatch(ItemTransfer $itemTransfer, ItemTransfer $itemToCompare): bool
    {
        return $this->getFactory()->createCartItemMatcher()->doItemsMatch($itemTransfer, $itemToCompare);
    }
}
