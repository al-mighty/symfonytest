<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BankHistoryRow
 *
 * @ORM\Table(name="bank_history_row")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\BankHistoryRowRepository")
 */
class BankHistoryRow extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="BankHistoryFile")
     * @ORM\JoinColumn(name="bank_history_file_id", referencedColumnName="id")
     */
    private $bankHistoryFile;

    /**
     * @ORM\Column(name="operation_date", type="datetime")
     */
    private $operationDate;

    /**
     * @ORM\Column(name="bank_history_rowcol", type="string", length=45, nullable=true)
     */
    private $bankHistoryRowcol;

    /**
     * @param BankHistoryFile $bankHistoryFile
     * @return BankHistoryRow
     */
    public function setBankHistoryFile(BankHistoryFile $bankHistoryFile)
    {
        $this->bankHistoryFile = $bankHistoryFile;

        return $this;
    }

    /**
     * @return BankHistoryFile
     */
    public function getBankHistoryFile()
    {
        return $this->bankHistoryFile;
    }

    /**
     * @param \DateTime $operationDate
     * @return BankHistoryRow
     */
    public function setOperationDate(\DateTime $operationDate)
    {
        $this->operationDate = $operationDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getOperationDate()
    {
        return $this->operationDate;
    }

    /**
     * @param string $bankHistoryRowcol
     * @return BankHistoryRow
     */
    public function setBankHistoryRowcol($bankHistoryRowcol)
    {
        $this->bankHistoryRowcol = $bankHistoryRowcol;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankHistoryRowcol()
    {
        return $this->bankHistoryRowcol;
    }
}

