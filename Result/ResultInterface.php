<?php
namespace Loevgaard\DandomainPayBundle\Result;

interface ResultInterface {
    public function populate();

    /**
     * Returns true if the operation succeeded
     *
     * @return bool
     */
    public function isSuccess();
}