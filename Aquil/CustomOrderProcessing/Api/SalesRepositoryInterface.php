<?php

namespace Aquil\CustomOrderProcessing\Api;

interface SalesRepositoryInterface
{
    /**
     * GET Order Increment Id for Post api
     * @param mixed $incrementId
     * @param mixed $orderStatus
     * @return string
     */

    public function getPostIncrementId($incrementId,$orderStatus);
}