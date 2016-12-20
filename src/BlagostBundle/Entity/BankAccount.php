<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BlagostBundle\Entity\Traits\StateDateTrait;

/**
 * BankAccount
 *
 * @ORM\Table(name="bank_account")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\BankAccountRepository")
 */
class BankAccount extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\Column(name="Iban", type="string", length=45)
     */
    private $iban;

    /**
     * @ORM\Column(name="currency", type="string", length=45)
     */
    private $currency;

    /**
     * @ORM\ManyToOne(targetEntity="Bank")
     * @ORM\JoinColumn(name="bank_id", referencedColumnName="id")
     */
    private $bank;

    /**
     * @ORM\ManyToOne(targetEntity="Temple")
     * @ORM\JoinColumn(name="temples_id", referencedColumnName="id")
     */
    private $temple;

    /**
     * @param string $iban
     * @return BankAccount
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $currency
     * @return BankAccount
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param Bank $bank
     * @return BankAccount
     */
    public function setBank(Bank $bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * @return BankAccount
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param Temple $temple
     * @return BankAccount
     */
    public function setTemple(Temple $temple)
    {
        $this->temple = $temple;

        return $this;
    }

    /**
     * @return BankAccount
     */
    public function getTemple()
    {
        return $this->temple;
    }

}

