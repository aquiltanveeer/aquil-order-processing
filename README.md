# Aquil_CustomOrderProcessing module
The Aquil_CustomOrderProcessing module satifies most of the given requirement from the document.

## Installation details

The Aquil_CustomOrderProcessing module - copy paste the module in app/code directory and run set:up and compile commands

## Swagger test results of order status change
to generate access token
 curl -XPOST -H 'Content-Type: application/json' http://production-local.org/rest/V1/integration/admin/token -d '{ "username": "akhiltanveer6", "password": "akhil@123" }'

## Test post data
{
"incrementId": "000001908",
"orderStatus": "Complete"
}

Response in swagger
"{\"success\":false,\"message\":\"Order Status already set to complete\"}"

Screenshot - https://prnt.sc/00oUhnMXALuo

### Database table Screenshot
https://imgur.com/qRYapwg.png

# Comments/Updates/Fixes

## Test case updates
For Demonstration a test case has been added for the Model SalesRepository in the following path
Aquil/CustomOrderProcessing/Test/Unit/Model/SalesRepositoryTest.php

## Exception handling
For Demonstration addional exceptional handling has been added to SalesRepository Model
Aquil/CustomOrderProcessing/Model/Api/SalesRepository.php

## Caching concept for APi
Considering we have Redis enabled and The api response we have implemented can be cached.
with the help of Magento\Framework\App\CacheInterface and has been implemented on the following API response which can give faster response on the second hit.
Caching file Path - app/code/Aquil/CustomOrderProcessing/Model/Api/SalesRepository.php


