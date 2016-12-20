<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BlagostBundle\Entity\Traits\StateDateTrait;

/**
 * BankHistoryFile
 *
 * @ORM\Table(name="bank_history_file")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\BankHistoryFileRepository")
 */
class BankHistoryFile extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\Column(name="file_name", type="string", length=255)
     */
    private $fileName;

    /**
     * @ORM\Column(name="export_date", type="datetime")
     */
    private $exportDate;

    /**
     * @ORM\Column(name="period_to", type="datetime", nullable=true)
     */
    private $periodTo;

    /**
     * @ORM\Column(name="period_from", type="datetime")
     */
    private $periodFrom;

    /**
     * @ORM\ManyToOne(targetEntity="BankAccount")
     * @ORM\JoinColumn(name="bank_account_id", referencedColumnName="id")
     */
    private $bankAccount;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @param string $fileName
     * @return BankHistoryFile
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param \DateTime $exportDate
     * @return BankHistoryFile
     */
    public function setExportDate($exportDate)
    {
        $this->exportDate = $exportDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExportDate()
    {
        return $this->exportDate;
    }

    /**
     * @param \DateTime $periodTo
     * @return BankHistoryFile
     */
    public function setPeriodTo(\DateTime $periodTo)
    {
        $this->periodTo = $periodTo;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPeriodTo()
    {
        return $this->periodTo;
    }

    /**
     * @param \DateTime $periodFrom
     * @return BankHistoryFile
     */
    public function setPeriodFrom(\DateTime $periodFrom)
    {
        $this->periodFrom = $periodFrom;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPeriodFrom()
    {
        return $this->periodFrom;
    }

    /**
     * @param BankAccount $bankAccount
     * @return BankHistoryFile
     */
    public function setBankAccount(BankAccount $bankAccount)
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param User $user
     * @return BankHistoryFile
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}

