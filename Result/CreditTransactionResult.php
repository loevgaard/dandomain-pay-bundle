<?php
namespace Loevgaard\DandomainPayBundle\Result;

class CreditTransactionResult extends Result
{
    /** @var string */
    protected $transactionId;

    /** @var int */
    protected $orderId;

    /** @var float */
    protected $amount;

    /** @var float */
    protected $originalAmount;

    /** @var float */
    protected $creditAmount;

    /** @var int */
    protected $internalCode;

    /** @var string */
    protected $codeDetail;

    /** @var int */
    protected $externalCode;

    /** @var string */
    protected $additionalDetail;

    /** @var string */
    protected $cardType;

    /** @var \DateTimeImmutable */
    protected $creditDate;

    /** @var \DateTimeImmutable */
    protected $transactionDate;

    /** @var \DateTimeImmutable */
    protected $renewDate;

    /** @var string */
    protected $transLiabilityShift;

    public function populate() {
        $this->transactionId        = $this->_data->Output->TransID;
        $this->orderId              = (int)$this->_data->Output->OrderID;
        $this->amount               = $this->_data->Output->Amount;
        $this->originalAmount       = $this->_data->Output->OriginalAmount;
        $this->creditAmount         = $this->_data->Output->CreditAmount;
        $this->internalCode         = (int)$this->_data->Output->InternalCode;
        $this->codeDetail           = $this->_data->Output->CodeDetail;
        $this->externalCode         = (int)$this->_data->Output->ExternalCode;
        $this->additionalDetail     = $this->_data->Output->AdditionalDetail;
        $this->cardType             = $this->_data->Output->CardType;
        $this->creditDate           = new \DateTimeImmutable($this->_data->Output->CreditDate); // @todo this is wrong, figure out the format and use \DateTimeImmutable::createFromFormat()
        $this->transactionDate      = new \DateTimeImmutable($this->_data->Output->TransactionDate);
        $this->renewDate            = new \DateTimeImmutable($this->_data->Output->RenewDate);
        $this->transLiabilityShift  = $this->_data->Output->TransLiabilityShift;
    }

    /**
     * @inheritdoc
     */
    public function isSuccess() {
        return $this->internalCode == 200;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return float
     */
    public function getOriginalAmount()
    {
        return $this->originalAmount;
    }

    /**
     * @return float
     */
    public function getCreditAmount()
    {
        return $this->creditAmount;
    }

    /**
     * @return int
     */
    public function getInternalCode()
    {
        return $this->internalCode;
    }

    /**
     * @return string
     */
    public function getCodeDetail()
    {
        return $this->codeDetail;
    }

    /**
     * @return int
     */
    public function getExternalCode()
    {
        return $this->externalCode;
    }

    /**
     * @return string
     */
    public function getAdditionalDetail()
    {
        return $this->additionalDetail;
    }

    /**
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreditDate()
    {
        return $this->creditDate;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getRenewDate()
    {
        return $this->renewDate;
    }

    /**
     * @return string
     */
    public function getTransLiabilityShift()
    {
        return $this->transLiabilityShift;
    }
}