<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Cart\Matcher;

use Generated\Shared\Transfer\ItemTransfer;

class CartItemMatcher implements CartItemMatcherInterface
{
    /**
     * @var \Spryker\Service\CartExtension\Dependency\Plugin\CartItemMatchVoterStrategyPluginInterface[]
     */
    protected $cartItemMatchVoterStrategyPlugins;

    /**
     * @param \Spryker\Service\CartExtension\Dependency\Plugin\CartItemMatchVoterStrategyPluginInterface[] $itemMatcherPlugins
     */
    public function __construct(array $itemMatcherPlugins)
    {
        $this->cartItemMatchVoterStrategyPlugins = $itemMatcherPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     * @param \Generated\Shared\Transfer\ItemTransfer $itemToCompare
     *
     * @return bool
     */
    public function doItemsMatch(ItemTransfer $itemTransfer, ItemTransfer $itemToCompare): bool
    {
        foreach ($this->cartItemMatchVoterStrategyPlugins as $cartItemMatchVoterStrategyPlugin) {
            if (!$cartItemMatchVoterStrategyPlugin->isApplicable($itemTransfer)) {
                continue;
            }

            if (!$cartItemMatchVoterStrategyPlugin->doItemsMatch($itemTransfer, $itemToCompare)) {
                return false;
            }
        }

        return $itemTransfer->getSku() === $itemToCompare->getSku();
    }
}
