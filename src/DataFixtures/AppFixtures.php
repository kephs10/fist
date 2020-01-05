<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        
        $user1 = new User("SUP_ADMIN");
        $user1->setPassword($this->encoder->encodePassword($user1, "ROLE_SUP_ADMIN"));
        $user1->setRoles((array("ROLE_SUP_ADMIN")));
        $user1->setUsername("SUP_ADMIN");
        $manager->persist($user1);

       

        $manager->flush();





    }

}

