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







