<?php

namespace MainBundle\Entity\Traits;

trait StateDateTrait
{
    /**
     * @ORM\Column(type="string", length=45)
     */
    private $state;

    /**
     * @ORM\Column(name="state_date", type="datetime")
     */
    private $stateDate;

    /**
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $createDate;

    /**
     * @param \DateTime $createDate
     * @return StateDateTrait
     */
    public function setCreateDate(\DateTime $createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param $state
     * @return StateDateTrait
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
     * @return StateDateTrait
     */
    public function setStateDate(\DateTime $stateDate)
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
}
