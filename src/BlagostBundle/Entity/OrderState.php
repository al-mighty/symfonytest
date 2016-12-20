<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderState
 *
 * @ORM\Table(name="order_states")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\OrderStateRepository")
 */
class OrderState extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
     */
    private $order;
    /**
     * @ORM\Column(name="state", type="string", length=45)
     */
    private $state;

    /**
     * @ORM\Column(name="state_date", type="datetime", nullable=true)
     */
    private $stateDate;

    /**
     * @ORM\Column(name="data", type="text", nullable=true)
     */
    private $data;

    /**
     * @ORM\Column(name="data2", type="text", nullable=true)
     */
    private $data2;

    /**
     * @param Order $order
     * @return OrderState
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string $state
     * @return OrderState
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param \DateTime $stateDate
     * @return OrderState
     */
    public function setStateDate($stateDate)
    {
        $this->stateDate = $stateDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStateDate()
    {
        return $this->stateDate;
    }

    /**
     * @param string $data
     * @return OrderState
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data2
     * @return OrderState
     */
    public function setData2($data2)
    {
        $this->data2 = $data2;

        return $this;
    }

    /**
     * @return string
     */
    public function getData2()
    {
        return $this->data2;
    }
}

