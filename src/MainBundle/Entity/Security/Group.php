<?php

namespace MainBundle\Entity\Security;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\BaseEntity;

/**
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\GroupRepository")
 */
class Group extends BaseEntity
{
    /**
     * Group codes
     */
    const GROUP_MEMBERS = 'members';
    const GROUP_STAFF    = 'worker_store';
    const GROUP_ADMIN      = 'admin';

    const GROUP_NAMES = [
        self::GROUP_MEMBERS => 'Участник',
        self::GROUP_STAFF    => 'Работник магазина',
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

    /**
     * Add role
     *
     * @param \MainBundle\Entity\Security\Role $role
     *
     * @return Group
     */
    public function addRole(\MainBundle\Entity\Security\Role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \MainBundle\Entity\Security\Role $role
     */
    public function removeRole(\MainBundle\Entity\Security\Role $role)
    {
        $this->roles->removeElement($role);
    }
}
