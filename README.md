# Fakturownia API
> PHP client that provides a simple connection with API Fakturowania.pl using Guzzle

## Technologies
* PHP 7.4

## Available methods
* getInvoiceFromId()
* getInvoiceFromOrderId()
* deleteInvoiceFromId()
* sendInvoiceToClientFromId()
* getWarehousesList()
* getWarehouseInfoById()
* deleteWarehouseDocumentFromId()
* addWarehouse()
* getAllProducts()
* getProductFromId()
* updateProduct()
* getAllClients()
* getClientFromId()
* getClientFromExternalId()
* addClient()
* updateClient()
* getAllPayments()
* getPaymentFromId()
* addPayment()
* getAllCategory()
* getCategoryFromId()
* addCategory()
* getAccountInfo()
* createAccount()

## Code Examples
Full example avilable in example.php
Simple example of get all products:
```
$fakturowniaConfig = new FakturowniaConfiguration('API_KEY', 'DOMAIN_IN_APP');
$httpClient  = new HttpClient(new \GuzzleHttp\Client());
$fakturownia = new Fakturownia($fakturowniaConfig, $httpClient);
$page = 1;
echo $fakturownia->getAllProducts($page);
```

## Status
Project is: in progress

To-do list:
* creating a class to handle the received data
* data validation for each method

## Fakturownia
Full documentation API: https://app.fakturownia.pl/api

## Licence
MIT