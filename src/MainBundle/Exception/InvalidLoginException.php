<?php

namespace MainBundle\Exception;

/**
 * Class InvalidLoginException
 * @package MainBundle\Exception
 */
class InvalidLoginException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Указанный вами номер телефона в системе не зарегистрирован");
    }
}
