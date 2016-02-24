<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Client\Cart\Zed;

use Generated\Shared\Transfer\CartChangeTransfer;
use Spryker\Client\ZedRequest\Stub\BaseStub;

class CartStub extends BaseStub implements CartStubInterface
{

    /**
     * @param \Generated\Shared\Transfer\CartChangeTransfer|\Spryker\Shared\Transfer\TransferInterface $cartChangeTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addItem(CartChangeTransfer $cartChangeTransfer)
    {
        return $this->zedStub->call('/cart/gateway/add-item', $cartChangeTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CartChangeTransfer|\Spryker\Shared\Transfer\TransferInterface $changeTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function removeItem(CartChangeTransfer $changeTransfer)
    {
        return $this->zedStub->call('/cart/gateway/remove-item', $changeTransfer);
    }

}
