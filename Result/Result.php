<?php
namespace Loevgaard\DandomainPayBundle\Result;

abstract class Result implements ResultInterface
{
    protected $_data;

    public function __construct($data)
    {
        $this->_data = $data;
        $this->populate();
    }

    public function populate() {
        // implement this in concrete classes
    }

    public function isSuccess() {
        // implement this in concrete classes
    }
}