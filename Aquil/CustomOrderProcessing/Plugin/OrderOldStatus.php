<?php
namespace Aquil\CustomOrderProcessing\Plugin;

    class OrderOldStatus
    {
    
    protected $logger;
    protected $saveOrderRepositoryInterface;
    private $orderFactory;
    
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Aquil\CustomOrderProcessing\Api\SaveOrderRepositoryInterface $saveOrderRepositoryInterface,
        \Aquil\CustomOrderProcessing\Model\OrderFactory $orderFactory
                    )
    {
        $this->logger = $logger;
        $this->saveOrderRepositoryInterface = $saveOrderRepositoryInterface;
        $this->orderFactory = $orderFactory;
    }
    
    public function beforeSave(\Magento\Sales\Model\Order $subject){
    
        $orderSubject = $subject->getData();
        $orderData = [
            'order_id' => $orderSubject['entity_id'], 
            'old_status' => $orderSubject['status'],
       ];

           $this->orderFactory->create()->setData($orderData)->save();
       }
    
    
}
?>