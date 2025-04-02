<?php

namespace Aquil\CustomOrderProcessing\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface OrderInterface extends ExtensibleDataInterface
{
    /**
     * @param $data
     */
    public function save($data): OrderInterface;
        
}
?>