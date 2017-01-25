<?php
namespace Loevgaard\DandomainPayBundle\Client;

use Loevgaard\DandomainPayBundle\Result\CreditTransactionResult;

class Client implements ClientInterface {
    /** @var \SoapClient */
    protected $client;

    public function __construct($wsdl, $username, $password)
    {
        $this->client = new \SoapClient($wsdl, [
            "trace"         => 1,
            "exceptions"    => 1
        ]);
        $this->client->__setSoapHeaders([
            new \SoapHeader('PAYSERVICE', 'Authorization', [
                'Username' => $username,
                'Password' => $password,
            ])
        ]);
    }

    /**
     * This Method captures the amount in the transaction based on the supplied transaction ID or orderID. If both IDs are supplied transaction ID is used.
     */
    public function captureTransaction() {

    }

    /**
     * This Method credits a transaction based on the supplied transaction ID or orderID. If both IDs are supplied transaction ID is used.
     *
     * @param string|int $transactionId
     * @param int $orderId
     * @param float $creditAmount
     * @return CreditTransactionResult
     * @throws \SoapFault
     * @throws \InvalidArgumentException
     */
    public function creditTransaction($transactionId = null, $orderId = null, $creditAmount = null) {
        if(!$transactionId && !$orderId) {
            throw new \InvalidArgumentException('Either transaction id or order id has to be supplied');
        }

        $input = [];
        if($transactionId) {
            $input['TransID'] = $transactionId;
        }
        if($orderId) {
            $input['OrderID'] = $orderId;
        }
        if($creditAmount) {
            $input['CreditAmount'] = $creditAmount;
        }
        return new CreditTransactionResult($this->client->CreditTransaction($input));
    }

    /**
     * @param string|int $transactionId
     * @param float $creditAmount
     * @return CreditTransactionResult
     * @throws \SoapFault
     * @throws \InvalidArgumentException
     */
    public function creditTransactionFromTransactionId($transactionId, $creditAmount = null) {
        return $this->creditTransaction($transactionId, null, $creditAmount);
    }

    /**
     * @param int $orderId
     * @param float $creditAmount
     * @return CreditTransactionResult
     * @throws \SoapFault
     * @throws \InvalidArgumentException
     */
    public function creditTransactionFromOrderId($orderId, $creditAmount = null) {
        return $this->creditTransaction(null, $orderId, $creditAmount);
    }

    /**
     * This method determines whether the web service is up and running.
     */
    public function healthCheck() {

    }

    /**
     * This Method creates a new transaction based on the supplied data. *WARNING*: You are not permitted to use this NewTransaction unless your own environment, servers etc. is PCI certified.
     */
    public function newTransaction() {

    }

    /**
     * This Method rejects a transaction based on the supplied transaction ID or orderID. If both IDs are supplied transaction ID is used.
     */
    public function rejectTransaction() {

    }

    /**
     * This Method renews the transaction based on the supplied transaction ID or orderID. If both IDs are supplied transaction ID is used.
     */
    public function renewTransaction() {

    }

    /**
     * This method returns details about a recurring subscriber subscription for the specified customer number
     */
    public function subscriptionDetails() {

    }

    /**
     * This Method returns the status of the transaction based on the supplied transaction ID or OrderID. If both IDs are supplied transaction ID is used.
     */
    public function transactionStatus() {

    }

    /**
     * This Method returns the status of all transactions matching the specified ordern ID
     */
    public function transactionStatusList() {

    }
}