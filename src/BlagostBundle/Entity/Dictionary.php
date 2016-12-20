<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dictionary
 *
 * @ORM\Table(name="dictionaries")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\DictionaryRepository")
 */
class Dictionary extends BaseEntity
{
    /**
     * @ORM\Column(name="code", type="string", length=45)
     */
    private $code;

    /**
     * @ORM\Column(name="name", type="string", length=45)
     */
    private $name;

    /**
     * @ORM\Column(name="type", type="string", length=45)
     */
    private $type;

    /**
     * @ORM\Column(name="short_desc", type="text", nullable=true)
     */
    private $shortDesc;

    /**
     * @param string $code
     * @return Dictionary
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $name
     * @return Dictionary
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $type
     * @return Dictionary
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
     * @param string $shortDesc
     * @return Dictionary
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    /**
     * @return string
     */
    public function getShortDesc()
    {
        return $this->shortDesc;
    }
}

