<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\Cart\Business\Operator;

use SprykerFeature\Shared\Cart\Messages\Messages;
use Generated\Shared\Cart\CartInterface;
use Generated\Shared\Cart\CartItemsInterface;

class AddOperator extends AbstractOperator
{
    /**
     * @param CartInterface $cart
     * @param CartItemsInterface $changedItems
     *
     * @return CartInterface
     */
    protected function changeCart(CartInterface $cart, CartItemsInterface $changedItems)
    {
        return $this->storageProvider->addItems($cart, $changedItems);
    }

    /**
     * @return string
     */
    protected function createSuccessMessage()
    {
        return Messages::ADD_ITEMS_SUCCESS;
    }
}
