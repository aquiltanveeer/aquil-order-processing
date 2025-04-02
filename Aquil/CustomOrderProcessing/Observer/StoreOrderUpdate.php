<?php

namespace Aquil\CustomOrderProcessing\Observer;

/**
 * Class StoreOrderUpdate
 *
 * @param Aquil\CustomOrderProcessing\Observer
 */
class StoreOrderUpdate implements \Magento\Framework\Event\ObserverInterface
{
    protected $logger;

    /**
     * Contruct function
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    protected $saveOrderRepositoryInterface;
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Aquil\CustomOrderProcessing\Api\SaveOrderRepositoryInterface $saveOrderRepositoryInterface
    ) {
        $this->logger = $logger;
        $this->saveOrderRepositoryInterface = $saveOrderRepositoryInterface;
    }

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        $order = $observer->getData('order');
        $orderData = [
                 'order_id' => $order->getId(), 
                 'new_status' => $order->getStatusLabel(),
                 'after_observer' => true
            ];

       $this->saveOrderRepositoryInterface->save($orderData);
    }
}
