<?php

namespace Aquil\CustomOrderProcessing\Model\Api;

use Psr\Log\LoggerInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\RuntimeException;

class SalesRepository
{
    protected $logger;
    protected $order;
    protected $cache;

    public function __construct(
        LoggerInterface $logger,
        \Magento\Sales\Api\Data\OrderInterface $order,
        \Magento\Framework\App\CacheInterface $cache
    )
    {
        $this->order = $order;
        $this->logger = $logger;
        $this->cache = $cache;
    }

    /**
     * @inheritdoc
     */
    public function getPostIncrementId($incrementId,$orderStatus)
    {
        try {
            $cacheData = $this->cache->load('sales_repo_custom_orderprocess');
            if ($cacheData) {
                return json_decode($cacheData, true);
            }
            $response = ['success' => false];
            $order = $this->order->loadByIncrementId($incrementId);
            $orderStatusCurrent = $order->getStatusLabel();
            $orderId = $order->getId();

            if(!$orderId) {
                $response = ['success' => false, 'message' => "Order Id doesn't exist"];
            } elseif($orderStatusCurrent == "Complete") {
                $response = ['success' => false, 'message' => "Order Status already set to complete"];
            } else {            
                $order->setStatus("complete");
                $order->save();
                $response = ['success' => true, 'message' => "Order status set to complete"];
            }
            
        } catch (\Exception $e) {
            $response = ['success' => false, 'message'=> "The increment Id doesn't exist", 'errorLogMessage' => $e->getMessage()];
            $this->logger->info($e->getMessage());
            throw new LocalizedException(__($response));
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (RuntimeException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } 
        $returnArray = json_encode($response);
        $this->cache->save($returnArray,"sales_repo_custom_orderprocess", ["sales_repo_custom_api_cache_tag"], 82000);
        sleep(2);
        return $returnArray; 
    }

}