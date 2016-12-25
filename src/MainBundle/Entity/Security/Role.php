<?php

namespace MainBundle\Entity\Security;

use MainBundle\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * @ORM\Table(name="roles")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\RoleRepository")
 */
class Role extends BaseEntity implements RoleInterface
{
    const ROLE_CREATE_ORDER           = 'CREATE_ORDER';
    const ROLE_READ_ORDER             = 'READ_ORDER';
    const ROLE_MEMBERS_ORDERS_LIST = 'Members_ORDERS_LIST';
    const ROLE_MEMBERS_PA          = 'Members_PERSONAL_AREA';
    const ROLE_CASHIER_PA             = 'CASHIER_PERSONAL_AREA';
    const ROLE_CASHIER_ORDER_SEARCH   = 'CASHIER_ORDER_SEARCH';
    const ROLE_EDIT_PD                = 'EDIT_PD';

    const ROLE_NAMES = [
        self::ROLE_CREATE_ORDER           => 'Создание заказа',
        self::ROLE_READ_ORDER             => 'Просмотр заказа',
        self::ROLE_MEMBERS_ORDERS_LIST => 'Просмотр прихожанином списка его заказов',
        self::ROLE_MEMBERS_PA          => 'Работа с личным кабинетом прихожанина',
        self::ROLE_CASHIER_PA             => 'Работа с личным кабинетом кассира',
        self::ROLE_CASHIER_ORDER_SEARCH   => 'Поиск заказов кассиром',
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
