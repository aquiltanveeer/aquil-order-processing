<?php

namespace Aquil\CustomOrderProcessing\Model;

use Aquil\CustomOrderProcessing\Model\ResourceModel\Order as OrderResourceModel;
use Magento\Framework\Model\AbstractModel;

class Order extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(OrderResourceModel::class);
    }
}