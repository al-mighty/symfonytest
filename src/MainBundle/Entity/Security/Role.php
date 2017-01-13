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
//    const ROLE_CREATE_ORDER           = 'CREATE_ORDER';
//    const ROLE_READ_ORDER             = 'READ_ORDER';
    const ROLE_ADMIN_USER_LIST    = 'ADMIN_USER_LIST';
    const ROLE_ADMIN_PA             = 'ADMIN_PERSONAL_AREA';
    const ROLE_STORAGE_LIST             = 'STORAGE_LIST';
//    const ROLE_CASHIER_PA             = 'CASHIER_PERSONAL_AREA';
//    const ROLE_CASHIER_ORDER_SEARCH   = 'CASHIER_ORDER_SEARCH';
    const ROLE_EDIT_PD                = 'EDIT_PD';

    const ROLE_NAMES = [
//        self::ROLE_CREATE_ORDER           => 'Создание заказа',
//        self::ROLE_READ_ORDER             => 'Просмотр заказа',
        self::ROLE_ADMIN_USER_LIST => 'Просмотр администратором всех пользователей',
        self::ROLE_ADMIN_PA          => 'Работа с личным кабинетом администратора',
        self::ROLE_STORAGE_LIST          => 'просмотр всех хранимых товаров',
//        self::ROLE_CASHIER_PA             => 'Работа с личным кабинетом кассира',
//        self::ROLE_CASHIER_ORDER_SEARCH   => 'Поиск заказов кассиром',
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
