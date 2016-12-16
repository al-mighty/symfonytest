<?php


namespace BlogBundle\DataFixtures\ORM;


use BlogBundle\Entity\Role;
use BlogBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserData implements FixtureInterface, ContainerAwareInterface{

  private $container;

  public function setContainer(ContainerInterface $container = null)
  {
    $this->container = $container;
  }

  public function load(ObjectManager $manager)
  {
    $roleName = "ROLE_USER";
    $roleRepository = $manager->getRepository('BlogBundle:Role');
    $role = $roleRepository->findByRole($roleName);
    if(!$role){
      $role = new Role();
      $role->setName('Authenticated');
      $role->setRole('ROLE_USER');
      $manager->persist($role);
      $manager->flush();
    }
    $userRepository = $manager->getRepository('BlogBundle:User');

    $encoder = $this->container->get('security.password_encoder');
    $email = "info@utilvideo.com";
    $profile = $userRepository->findByEmail($email);
    if(!$profile){
      $profile = new User();
      $profile->setEmail($email);
      $profile->setUsername( md5( $profile->getEmail() ) );
      $password = $encoder->encodePassword($profile, "123456");
      $profile->setPassword($password);
      $profile->addRole($role);
      $manager->persist($profile);
      $manager->flush();
    }
   

  }
}
