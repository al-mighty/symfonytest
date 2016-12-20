<?php

namespace StuntBundle\Entity\Security;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use StuntBundle\Entity\BaseEntity;

/**
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="StuntBundle\Repository\GroupRepository")
 */
class Group extends BaseEntity
{
    /**
     * Group codes
     */
    const GROUP_CONGREGANT = 'GROUP_CONGREGANT';
    const GROUP_CASHIER    = 'GROUP_CASHIER';
    const GROUP_PRIEST     = 'GROUP_PRIEST';
    const GROUP_ACCOUNTANT = 'GROUP_ACCOUNTANT';
    const GROUP_ADMIN      = 'GROUP_ADMIN';

    const GROUP_NAMES = [
        self::GROUP_CONGREGANT => 'Прихожанин',
        self::GROUP_CASHIER    => 'Кассир',
        self::GROUP_PRIEST     => 'Настоятель',
        self::GROUP_ACCOUNTANT => 'Бухгалтер РПЦ',
        self::GROUP_ADMIN      => 'Глобальный администратор'
    ];

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="groups_roles",
     *      joinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     *      )
     */
    private $roles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    /**
     * @param $code
     * @return Group
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
     * @param $name
     * @return Group
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
     * @param ArrayCollection $roles
     */
    public function setRoles(ArrayCollection $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return ArrayCollection
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
