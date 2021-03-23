<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
	private $passwordEncoder;
	
	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
		$this->passwordEncoder = $passwordEncoder;
	}
	
    public function load(ObjectManager $manager)
    {
		$admin = new User();
		
		$admin->setRoles(['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']);
		$admin->setEmail('admin@admin.fr');
		$admin->setLastName('admin');
		$admin->setFirstName('admin');
		$admin->setAddress('404ruedesadmin');
		$admin->setCity('admin');
		$admin->setPostalCode('42720');
		$admin->setHireDate(new DateTime());
		$admin->setRegistrationNumber('0123456789');
		$admin->setPhone('0123456789');
		$admin->setPassword($this->passwordEncoder->encodePassword(
			$admin,
			'admin'
		));
        // $product = new Product();
        // $manager->persist($product);

		$manager->persist($admin);
        $manager->flush();
    }
}
