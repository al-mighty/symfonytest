<?php
//php bin/console doctrine:generate:entities BlogBundle
//php bin/console doctrine:schema:update --force


namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;


/**
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\UserRepository")
 */
class Role implements RoleInterface{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
  private $id;

  /**
   * @ORM\Column(type="string")
   */
  private $name;

  /**
   * @ORM\Column(type="string", unique=true)
   */
  private $role;

  /**
   * @ORM\ManyToMany(targetEntity="User", mappedBy="roles")
   */
  private $users;


    /**
     * Constructor
     */
    public function __construct()
{
	$this->users = new ArrayCollection();
}
	
	public function getRole()
	{
		return $this->role;
	}

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
     * Set name
     *
     * @param string $name
     *
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Add user
     *
     * @param \BlogBundle\Entity\User $user
     *
     * @return Role
     */
    public function addUser(\BlogBundle\Entity\User $user)
    {
        $this->users[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param \BlogBundle\Entity\User $user
     */
    public function removeUser(\BlogBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
