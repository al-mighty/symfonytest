<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class BaseEntity
{
    const VALUE_YES = 'Y';
    const VALUE_NO = 'N';
    
    /**
     * @ORM\Column(name="id", type="integer", unique=true)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Id
     */
    private $id;

    /**
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $prop
     * @return string
     */
    public function propToSetter($prop)
    {
        return 'set' . ucfirst($prop);
    }

    /**
     * @param $prop
     * @param $value
     * @return mixed
     */
    public function setProp($prop, $value)
    {
        return call_user_func([$this, $this->propToSetter($prop)], $value);
    }

    /**
     * @param array $data
     */
    public function setParams(array $data)
    {
        foreach ($data as $prop => $value) {
            $this->setProp($prop, $value);
        }
    }
}
