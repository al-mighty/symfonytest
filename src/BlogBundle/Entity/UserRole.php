<?php
//php bin/console doctrine:generate:entities BlogBundle
//php bin/console doctrine:schema:update --force


namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="UserRoles")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\UserRepository")
 */
class UserRole
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * name="user"
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $userRole;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userRole
     *
     * @param string $userRole
     *
     * @return UserRole
     */
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;
    
        return $this;
    }

    /**
     * Get userRole
     *
     * @return string
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * Set userId
     *
     * @param \BlogBundle\Entity\User $userId
     *
     * @return UserRole
     */
    public function setUserId(\BlogBundle\Entity\User $userId = null)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return \BlogBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
