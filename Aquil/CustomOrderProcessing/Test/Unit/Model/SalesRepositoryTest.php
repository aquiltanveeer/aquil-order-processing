<?php

namespace Aquil\CustomOrderProcessing\Test\Unit\Model;

class SalesRepositoryTest extends  \PHPUnit\Framework\TestCase {

    protected $_objectManager;
    protected $_desiredResult;
    protected $_actulResult;
    protected $_salesRepository;

    /**
     * Used to set the values to variables or objects.
     *
     * @return void
     */
    public function setUp(): void {
        $this->_objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_salesRepository = $this->_objectManager->getObject("Aquil\CustomOrderProcessing\Model\Api\SalesRepository");
    }
    /**
     * This function will set order status 
     *
     * @param int $incrementId
     * @param int $orderStatus
     * @return array
     */
    public function testGetPostIncrementId($incrementId,$orderStatus) { 
         $this->_actulResult = $this->_salesRepository->getPostIncrementId(1234,12345);
         $desiredResponse = ['success' => false, 'message'=> "The increment Id doesn't exist", 'errorLogMessage' => $e->getMessage()];
         $this->_desiredResult = json_encode($desiredResponse);
         $this->assertEquals($this->_desiredResult, $this->_actulResult);
    }
}
//vendor/bin/phpunit -c dev/tests/unit/phpunit.xml.dist          app/code/Aquil/CustomOrderProcessing/Test/Unit/Model
