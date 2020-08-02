<?php

declare(strict_types=1);

namespace Luigor\Fakturownia;

use Luigor\Fakturownia\FakturowniaConfiguration;
use Luigor\Fakturownia\HttpClient;

final class Fakturownia
{
    private FakturowniaConfiguration $config;
    private HttpClient $client;

    /**
     * Fakturownia constructor.
     * @param \Luigor\Fakturownia\FakturowniaConfiguration $config
     * @param \Luigor\Fakturownia\HttpClient $client
     */
    public function __construct(FakturowniaConfiguration $config, HttpClient $client)
    {
        $this->config = $config;
        $this->client = $client;
    }

    /**
     * @param int $invoiceId
     * @return mixed
     */
    public function getInvoiceFromId(int $invoiceId)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/invoices/'.$invoiceId.'.json/?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $orderId
     * @return mixed
     */
    public function getInvoiceFromOrderId(int $orderId)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/invoices.json?oid='.$orderId.'&api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $invoiceId
     * @return mixed
     */
    public function deleteInvoiceFromId(int $invoiceId)
    {
        return $this->client->request(
            'DELETE',
            $this->config->urlRequest().'/invoices/'.$invoiceId.'.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $invoiceId
     * @return mixed
     */
    public function sendInvoiceToClientFromId(int $invoiceId)
    {
        return $this->client->request(
            'POST',
            $this->config->urlRequest().'/invoices/'.$invoiceId.'/send_by_email.json/?api_token='.
            $this->config->getApiKey()
        );
    }

    /**
     * @return mixed
     */
    public function getWarehousesList()
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/warehouses.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $warehouseId
     * @return mixed
     */
    public function getWarehouseInfoById(int $warehouseId)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/warehouses/'.$warehouseId.'.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $documentId
     * @return mixed
     */
    public function deleteWarehouseDocumentFromId(int $documentId)
    {
        return $this->client->request(
            'DELETE',
            $this->config->urlRequest().'/warehouse_documents/'.$documentId.'.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param array $warehousesData
     * @return mixed
     */
    public function addWarehouse(array $warehousesData)
    {
        $data = [
            'api_token' => $this->config->getApiKey(),
            'warehouse' => $warehousesData
        ];

        return $this->client->request('POST', $this->config->urlRequest().'/warehouses.json', $data);
    }

    /**
     * @param int $page
     * @return mixed
     */
    public function getAllProducts(int $page = 1)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/products.json?page='.$page.'&api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function getProductFromId(int $productId)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/products/'.$productId.'.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $productId
     * @param array $productData
     * @return mixed
     */
    public function updateProduct(int $productId, array $productData)
    {
        $data = [
            'api_token' => $this->config->getApiKey(),
            'product' => $productData
        ];

        return $this->client->request('PUT', $this->config->urlRequest().'/products/'.$productId.'.json', $data);
    }


    /**
     * @param int $page
     * @return mixed
     */
    public function getAllClients(int $page = 1)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/clients.json?page='.$page.'&api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $clientId
     * @return mixed
     */
    public function getClientFromId(int $clientId)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/clients/'.$clientId.'.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $clientId
     * @return mixed
     */
    public function getClientFromExternalId(int $clientId)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest() . '/clients.json?external_id='.$clientId.'&api_token='.
            $this->config->getApiKey()
        );
    }

    /**
     * @param array $client
     * @return mixed
     */
    public function addClient(array $client)
    {
        $data = [
            'api_token' => $this->config->getApiKey(),
            'client' => $client
        ];

        return $this->client->request('POST', $this->config->urlRequest().'/clients.json', $data);
    }

    /**
     * @param int $clientId
     * @param array $clientData
     * @return mixed
     */
    public function updateClient(int $clientId, array $clientData)
    {
        $data = [
            'api_token' => $this->config->getApiKey(),
            'client' => $clientData
        ];

        return $this->client->request('PUT', $this->config->urlRequest().'/clients/'.$clientId.'.json', $data);
    }


    /**
     * @return mixed
     */
    public function getAllPayments()
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/banking/payments.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $paymentId
     * @return mixed
     */
    public function getPaymentFromId(int $paymentId)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/banking/payment/'.$paymentId.'.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param array $paymentData
     * @return mixed
     */
    public function addPayment(array $paymentData)
    {
        $data = [
            'api_token' => $this->config->getApiKey(),
            'banking_payment' => $paymentData
        ];

        return $this->client->request('POST', $this->config->urlRequest().'/banking/payments.json', $data);
    }


    /**
     * @return mixed
     */
    public function getAllCategory()
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/categories.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param int $categoryId
     * @return mixed
     */
    public function getCategoryFromId(int $categoryId)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/categories/'.$categoryId.'.json?api_token='.$this->config->getApiKey()
        );
    }

    /**
     * @param array $categoryData
     * @return mixed
     */
    public function addCategory(array $categoryData)
    {
        $data = [
            'api_token' => $this->config->getApiKey(),
            'category' => $categoryData
        ];

        return $this->client->request('POST', $this->config->urlRequest().'/categories.json', $data);
    }

    /**
     * @param string $emailUsForThisToken
     * @return mixed
     */
    public function getAccountInfo(string $emailUsForThisToken)
    {
        return $this->client->request(
            'GET',
            $this->config->urlRequest().'/account.json?api_token='.$this->config->getApiKey().'&integration_token='.
            $emailUsForThisToken
        );
    }

    /**
     * @param string $prefix
     * @param string $emailUsForThisToken
     * @return mixed
     */
    public function createAccount(string $prefix, string $emailUsForThisToken)
    {
        $data = [
            'api_token' => $this->config->getApiKey(),
            'account' => [
                "prefix" => $prefix
            ],
            'integration_token' => $emailUsForThisToken
        ];

        return $this->client->request('POST', $this->config->urlRequest().'/account.json', $data);
    }

}
