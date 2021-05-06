<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Cart\Matcher;

use Generated\Shared\Transfer\ItemTransfer;

interface CartItemMatcherInterface
{
    /**
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     * @param \Generated\Shared\Transfer\ItemTransfer $itemToCompare
     *
     * @return bool
     */
    public function doItemsMatch(ItemTransfer $itemTransfer, ItemTransfer $itemToCompare): bool;
}
