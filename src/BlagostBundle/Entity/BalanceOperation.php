<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BlagostBundle\Entity\Traits\StateDateTrait;
/**
 * BalanceOperation
 *
 * @ORM\Table(name="balance_operations")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\BalanceOperationRepository")
 */
class BalanceOperation extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\ManyToOne(targetEntity="Congregant")
     * @ORM\JoinColumn(name="congregants_id", referencedColumnName="id")
     */
    private $congregant;

    /**
     * @ORM\Column(name="summ", type="float")
     */
    private $summ;

    /**
     * @ORM\Column(name="type", type="string", length=45)
     */
    private $type;

    /**
     * @ORM\Column(name="source", type="string", length=45)
     */
    private $source;

    /**
     * @ORM\Column(name="operation_id", type="integer", nullable=true)
     */
    private $operationId;

    /**
     * @param Congregant $congregant
     * @return BalanceOperation
     */
    public function setCongregant(Congregant $congregant)
    {
        $this->congregant = $congregant;

        return $this;
    }

    /**
     * @return Congregant
     */
    public function getCongregant()
    {
        return $this->congregant;
    }

    /**
     * @param float $summ
     * @return BalanceOperation
     */
    public function setSumm($summ)
    {
        $this->summ = $summ;

        return $this;
    }

    /**
     * @return float
     */
    public function getSumm()
    {
        return $this->summ;
    }

    /**
     * @param string $type
     * @return BalanceOperation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $source
     * @return BalanceOperation
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param integer $operationId
     * @return BalanceOperation
     */
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;

        return $this;
    }

    /**
     * @return int
     */
    public function getOperationId()
    {
        return $this->operationId;
    }
}

