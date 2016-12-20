<?php

namespace BlogBundle\Entity\Security;

use BlogBundle\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * @ORM\Table(name="roles")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\RoleRepository")
 */
class Role extends BaseEntity implements RoleInterface
{
    const ROLE_CREATE_ORDER           = 'CREATE_ORDER';
    const ROLE_CONGREGANT_ORDERS_LIST = 'CONGREGANT_ORDERS_LIST';
    const ROLE_CONGREGANT_PA          = 'CONGREGANT_PERSONAL_AREA';
    const ROLE_CASHIER_PA             = 'CASHIER_PERSONAL_AREA';
    const ROLE_EDIT_PD                = 'EDIT_PD';

    const ROLE_NAMES = [
        self::ROLE_CREATE_ORDER           => 'Создание заказа',
        self::ROLE_CONGREGANT_ORDERS_LIST => 'Просмотр прихожанином списка его заказов',
        self::ROLE_CONGREGANT_PA          => 'Работа с личным кабинетом прихожанина',
        self::ROLE_CASHIER_PA             => 'Работа с личным кабинетом кассира',
        self::ROLE_EDIT_PD                => 'Редактирование персональных данных'
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
