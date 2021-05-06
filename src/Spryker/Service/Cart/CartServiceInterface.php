<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Cart;

use Generated\Shared\Transfer\ItemTransfer;

interface CartServiceInterface
{
    /**
     * Specification:
     * - Checks if two ItemTransfers are matching, based on a stack of plugins (ItemMatcherStrategyPluginInterface).
     * - If no plugin is applicable or there is no plugin configured at all, the matching will be based on the sku of the items.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     * @param \Generated\Shared\Transfer\ItemTransfer $itemToCompare
     *
     * @return bool
     */
    public function doItemsMatch(ItemTransfer $itemTransfer, ItemTransfer $itemToCompare): bool;
}
