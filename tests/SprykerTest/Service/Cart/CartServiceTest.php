<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Service\Cart;

use Codeception\Test\Unit;
use Spryker\Service\Cart\CartDependencyProvider;
use Spryker\Service\CartExtension\Dependency\Plugin\CartItemMatchVoterStrategyPluginInterface;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Service
 * @group Cart
 * @group CartServiceTest
 * Add your own group annotations below this line
 */
class CartServiceTest extends Unit
{
    /**
     * @var \Spryker\Service\Cart\CartService
     */
    protected $cartService;

    /**
     * @var \SprykerTest\Service\Cart\CartServiceTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->cartService = $this->tester->getLocator()->cart()->service();
    }

    /**
     * @return void
     */
    public function testDoItemsMatchReturnsTrueForEqualSkus(): void
    {
        // Arrange
        $itemTransfer1 = $this->tester->createItemTransfer('123');
        $itemTransfer2 = $this->tester->createItemTransfer('123');

        // Act
        $result = $this->cartService->doItemsMatch($itemTransfer1, $itemTransfer2);

        // Assert
        $this->assertTrue($result);
    }

    /**
     * @return void
     */
    public function testDoItemsMatchReturnsFalseForUnequalSkus(): void
    {
        // Arrange
        $itemTransfer1 = $this->tester->createItemTransfer('123');
        $itemTransfer2 = $this->tester->createItemTransfer('321');

        // Act
        $result = $this->cartService->doItemsMatch($itemTransfer1, $itemTransfer2);

        // Assert
        $this->assertFalse($result);
    }

    /**
     * @return void
     */
    public function testDoItemsMatchReturnsTrueForApplicablePlugin(): void
    {
        // Arrange
        $itemTransfer1 = $this->tester->createItemTransfer('123');
        $itemTransfer2 = $this->tester->createItemTransfer('123');

        $cartItemMatchVoterStrategyPlugin = $this->getMockBuilder(CartItemMatchVoterStrategyPluginInterface::class)
            ->getMock();

        $cartItemMatchVoterStrategyPlugin
            ->method('isApplicable')
            ->willReturn(true);

        $cartItemMatchVoterStrategyPlugin
            ->method('doItemsMatch')
            ->willReturn(true);

        $this->tester->setDependency(
            CartDependencyProvider::PLUGINS_CART_ITEM_MATCH_VOTER_STRATEGY,
            [$cartItemMatchVoterStrategyPlugin]
        );

        // Act
        $result = $this->cartService->doItemsMatch($itemTransfer1, $itemTransfer2);

        // Assert
        $this->assertTrue($result);
    }

    /**
     * @return void
     */
    public function testDoItemsMatchReturnsTrueForNotApplicablePlugin(): void
    {
        // Arrange
        $itemTransfer1 = $this->tester->createItemTransfer('123');
        $itemTransfer2 = $this->tester->createItemTransfer('123');

        $cartItemMatchVoterStrategyPlugin = $this->getMockBuilder(CartItemMatchVoterStrategyPluginInterface::class)
            ->getMock();

        $cartItemMatchVoterStrategyPlugin
            ->method('isApplicable')
            ->willReturn(false);

        $this->tester->setDependency(
            CartDependencyProvider::PLUGINS_CART_ITEM_MATCH_VOTER_STRATEGY,
            [$cartItemMatchVoterStrategyPlugin]
        );

        // Act
        $result = $this->cartService->doItemsMatch($itemTransfer1, $itemTransfer2);

        // Assert
        $this->assertTrue($result);
    }

    /**
     * @return void
     */
    public function testDoItemsMatchReturnsFalseForNotApplicablePlugin(): void
    {
        // Arrange
        $itemTransfer1 = $this->tester->createItemTransfer('123');
        $itemTransfer2 = $this->tester->createItemTransfer('321');

        $cartItemMatchVoterStrategyPlugin = $this->getMockBuilder(CartItemMatchVoterStrategyPluginInterface::class)
            ->getMock();

        $cartItemMatchVoterStrategyPlugin
            ->method('isApplicable')
            ->willReturn(false);

        $this->tester->setDependency(
            CartDependencyProvider::PLUGINS_CART_ITEM_MATCH_VOTER_STRATEGY,
            [$cartItemMatchVoterStrategyPlugin]
        );

        // Act
        $result = $this->cartService->doItemsMatch($itemTransfer1, $itemTransfer2);

        // Assert
        $this->assertFalse($result);
    }

    /**
     * @return void
     */
    public function testDoItemsMatchReturnsFalseForNotMatchingPlugin(): void
    {
        // Arrange
        $itemTransfer1 = $this->tester->createItemTransfer('123');
        $itemTransfer2 = $itemTransfer1;

        $cartItemMatchVoterStrategyPlugin = $this->getMockBuilder(CartItemMatchVoterStrategyPluginInterface::class)
            ->getMock();

        $cartItemMatchVoterStrategyPlugin
            ->method('isApplicable')
            ->willReturn(true);
        $cartItemMatchVoterStrategyPlugin
            ->method('doItemsMatch')
            ->willReturn(false);

        $this->tester->setDependency(
            CartDependencyProvider::PLUGINS_CART_ITEM_MATCH_VOTER_STRATEGY,
            [$cartItemMatchVoterStrategyPlugin]
        );

        // Act
        $result = $this->cartService->doItemsMatch($itemTransfer1, $itemTransfer2);

        // Assert
        $this->assertFalse($result);
    }

    /**
     * @return void
     */
    public function testDoItemsMatchReturnsFalseForApplicablePluginAndNotMatchingSku(): void
    {
        // Arrange
        $itemTransfer1 = $this->tester->createItemTransfer('123');
        $itemTransfer2 = $this->tester->createItemTransfer('321');

        $cartItemMatchVoterStrategyPlugin = $this->getMockBuilder(CartItemMatchVoterStrategyPluginInterface::class)
            ->getMock();

        $cartItemMatchVoterStrategyPlugin
            ->method('isApplicable')
            ->willReturn(true);

        $cartItemMatchVoterStrategyPlugin
            ->method('doItemsMatch')
            ->willReturn(true);

        $this->tester->setDependency(
            CartDependencyProvider::PLUGINS_CART_ITEM_MATCH_VOTER_STRATEGY,
            [$cartItemMatchVoterStrategyPlugin]
        );

        // Act
        $result = $this->cartService->doItemsMatch($itemTransfer1, $itemTransfer2);

        // Assert
        $this->assertFalse($result);
    }
}
