<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Cart;

use Spryker\Service\Kernel\AbstractBundleDependencyProvider;
use Spryker\Service\Kernel\Container;

class CartDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PLUGINS_CART_ITEM_MATCH_VOTER_STRATEGY = 'PLUGINS_CART_ITEM_MATCH_VOTER_STRATEGY';

    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return \Spryker\Service\Kernel\Container
     */
    public function provideServiceDependencies(Container $container): Container
    {
        $container = parent::provideServiceDependencies($container);

        $container = $this->addCartItemMatchVoterStrategyPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return \Spryker\Service\Kernel\Container
     */
    protected function addCartItemMatchVoterStrategyPlugins(Container $container): Container
    {
        $container->set(static::PLUGINS_CART_ITEM_MATCH_VOTER_STRATEGY, function () {
            return $this->getCartItemMatchVoterStrategyPlugins();
        });

        return $container;
    }

    /**
     * @return \Spryker\Service\CartExtension\Dependency\Plugin\CartItemMatchVoterStrategyPluginInterface[]
     */
    protected function getCartItemMatchVoterStrategyPlugins(): array
    {
        return [];
    }
}
