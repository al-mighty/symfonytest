<?php

namespace BlogBundle\Service;

/**
 * Class PasswordGenerator
 * @package BlogBundle\Service
 */
class PasswordGenerator
{    
    private $symbols = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    
    private $length = 10;

    /**
     * @param int $length
     * @return string
     */
    public function generate($length = 0)
    {
        if (intval($length) > 0) {
            $this->length = $length;
        }
        
        return substr(str_shuffle($this->symbols), 0, $this->length);
    }
}
