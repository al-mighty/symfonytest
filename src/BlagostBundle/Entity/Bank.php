<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bank
 *
 * @ORM\Table(name="bank")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\BankRepository")
 */
class Bank extends BaseEntity
{
    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="swift_bik", type="string", length=45)
     */
    private $swiftBik;

    /**
     * @ORM\Column(name="nostro_account", type="string", length=45)
     */
    private $nostroAccount;

    /**
     * @param string $name
     * @return Bank
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
     * @param string $swiftBik
     * @return Bank
     */
    public function setSwiftBik($swiftBik)
    {
        $this->swiftBik = $swiftBik;

        return $this;
    }

    /**
     * @return string
     */
    public function getSwiftBik()
    {
        return $this->swiftBik;
    }

    /**
     * @param string $nostroAccount
     * @return Bank
     */
    public function setNostroAccount($nostroAccount)
    {
        $this->nostroAccount = $nostroAccount;

        return $this;
    }

    /**
     * @return string
     */
    public function getNostroAccount()
    {
        return $this->nostroAccount;
    }
}

