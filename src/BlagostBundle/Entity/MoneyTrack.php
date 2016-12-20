<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BlagostBundle\Entity\Traits\StateDateTrait;

/**
 * MoneyTrack
 *
 * @ORM\Table(name="money_track")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\MoneyTrackRepository")
 */
class MoneyTrack extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\ManyToOne(targetEntity="BankAccount")
     * @ORM\JoinColumn(name="bank_account_id_temple1", referencedColumnName="id", nullable=true)
     */
    private $bankAccountTemple1;

    /**
     * @ORM\ManyToOne(targetEntity="BankAccount")
     * @ORM\JoinColumn(name="bank_account_id_central", referencedColumnName="id")
     */
    private $bankAccountCentral;

    /**
     * @ORM\ManyToOne(targetEntity="BankAccount")
     * @ORM\JoinColumn(name="bank_account_id_temple2", referencedColumnName="id")
     */
    private $bankAccountTemple2;

    /**
     * @param BankAccount $bankAccountTemple1
     * @return MoneyTrack
     */
    public function setBankAccountTemple1(BankAccount $bankAccountTemple1)
    {
        $this->bankAccountTemple1 = $bankAccountTemple1;

        return $this;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccountTemple1()
    {
        return $this->bankAccountTemple1;
    }

    /**
     * @param BankAccount $bankAccountCentral
     * @return MoneyTrack
     */
    public function setBankAccountCentral(BankAccount $bankAccountCentral)
    {
        $this->bankAccountCentral = $bankAccountCentral;

        return $this;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccountCentral()
    {
        return $this->bankAccountCentral;
    }

    /**
     * @param BankAccount $bankAccountTemple2
     * @return MoneyTrack
     */
    public function setBankAccountTemple2(BankAccount $bankAccountTemple2)
    {
        $this->bankAccountTemple2 = $bankAccountTemple2;

        return $this;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccountTemple2()
    {
        return $this->bankAccountTemple2;
    }

}

