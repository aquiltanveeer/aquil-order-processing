<?php

namespace Aquil\CustomOrderProcessing\Model\ResourceModel\Order;

use Aquil\CustomOrderProcessing\Model\Order as OrderModel;
use Aquil\CustomOrderProcessing\Model\ResourceModel\Order as OrderResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            OrderModel::class,
            OrderResourceModel::class
        );
    }
}