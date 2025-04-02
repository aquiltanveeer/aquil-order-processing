<?php

namespace Aquil\CustomOrderProcessing\Observer;

/**
 * Class SendShipmentMail
 *
 * @param Aquil\CustomOrderProcessing\Observer
 */
class SendShipmentMail implements \Magento\Framework\Event\ObserverInterface
{
    protected $logger;
    protected $shipmentNotifier;

    /**
     * Contruct function
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\ShipmentNotifier $shipmentNotifier
    ) {
        $this->logger = $logger;
        $this->shipmentNotifier = $shipmentNotifier;
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
        $shipmentData = $observer->getEvent()->getShipment();
        $shipment = $this->shipmentNotifier->notify($shipmentData);
  
    }
}
