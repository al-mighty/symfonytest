<?php

namespace BlogBundle\Exception;

/**
 * Class InvalidLoginException
 * @package BlogBundle\Exception
 */
class InvalidLoginException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Указанный вами номер телефона в системе не зарегистрирован");
    }
}
