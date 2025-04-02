<?php
namespace Aquil\CustomOrderProcessing\Model;

class OrderRepositoryModel implements \Aquil\CustomOrderProcessing\Api\SaveOrderRepositoryInterface
{
    private $orderFactory;

    public function __construct(
         \Aquil\CustomOrderProcessing\Model\OrderFactory $orderFactory
    ) {
         $this->orderFactory = $orderFactory;
    }
    /**
     * Save order data.
     */

    public function save($data)
    {
        $orderId = $data['order_id'];

        $this->orderFactory->create()->setData($data)->save();
        
    }
}