<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DicData
 *
 * @ORM\Table(name="dic_data")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\DicDataRepository")
 */
class DicData extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="Dictionary")
     * @ORM\JoinColumn(name="dictionaries_id", referencedColumnName="id")
     */
    private $dictionary;

    /**
     * @ORM\Column(name="code", type="string", length=45)
     */
    private $code;

    /**
     * @ORM\Column(name="name", type="string", length=45)
     */
    private $name;

    /**
     * @ORM\Column(name="name2", type="string", length=45, nullable=true)
     */
    private $name2;

    /**
     * @ORM\Column(name="name3", type="string", length=45, nullable=true)
     */
    private $name3;

    /**
     * @ORM\Column(name="short_desc", type="text", nullable=true)
     */
    private $shortDesc;

    /**
     * @param Dictionary $dictionary
     * @return DicData
     */
    public function setDictionary(Dictionary $dictionary)
    {
        $this->dictionary = $dictionary;

        return $this;
    }

    /**
     * @return Dictionary
     */
    public function getDictionary()
    {
        return $this->dictionary;
    }

    /**
     * @param string $code
     * @return DicData
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
     * @return DicData
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
     * @param string $name2
     * @return DicData
     */
    public function setName2($name2)
    {
        $this->name2 = $name2;

        return $this;
    }

    /**
     * @return string
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * @param string $name3
     * @return DicData
     */
    public function setName3($name3)
    {
        $this->name3 = $name3;

        return $this;
    }

    /**
     * @return string
     */
    public function getName3()
    {
        return $this->name3;
    }

    /**
     * @param string $shortDesc
     * @return DicData
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

