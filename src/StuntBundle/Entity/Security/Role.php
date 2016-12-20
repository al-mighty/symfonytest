<?php

namespace StuntBundle\Entity\Security;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;
use StuntBundle\Entity\BaseEntity;

/**
 * @ORM\Table(name="roles")
 * @ORM\Entity(repositoryClass="StuntBundle\Repository\RoleRepository")
 */
class Role extends BaseEntity implements RoleInterface
{
    const ROLE_CREATE_ORDER = 'CREATE_ORDER';
    
    const ROLE_NAMES = [
        self::ROLE_CREATE_ORDER => 'Создание заказа'
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
     * @param $code
     * @return Role
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
     * @return Role
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
     * @return string
     */
    public function getRole()
    {
        return "ROLE_" . $this->getCode();
    }
}
