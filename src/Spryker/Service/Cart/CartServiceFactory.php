<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Cart;

use Spryker\Service\Cart\Matcher\CartItemMatcher;
use Spryker\Service\Cart\Matcher\CartItemMatcherInterface;
use Spryker\Service\Kernel\AbstractServiceFactory;

class CartServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \Spryker\Service\Cart\Matcher\CartItemMatcherInterface
     */
    public function createCartItemMatcher(): CartItemMatcherInterface
    {
        return new CartItemMatcher(
            $this->getCartItemMatchVoterStrategyPlugins()
        );
    }

    /**
     * @return \Spryker\Service\CartExtension\Dependency\Plugin\CartItemMatchVoterStrategyPluginInterface[]
     */
    public function getCartItemMatchVoterStrategyPlugins(): array
    {
        return $this->getProvidedDependency(CartDependencyProvider::PLUGINS_CART_ITEM_MATCH_VOTER_STRATEGY);
    }
}
