<?php
// src/Ens/JobeetBundle/DataFixtures/ORM/LoadCategoryData.php
namespace Zlab\FrontendBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Zlab\FrontendBundle\Entity\Ebook;
 
class LoadEbookData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    
    $title = array(
    		'Expert MySQL, 2nd Edition',
    		'Professional Website Performance',
    		'MySQL Pocket Reference, 2nd Edition',
    		'RubyMotion',
    		'Linux in a Nutshell, 6th Edition',
    		'Professional Excel Development, 2nd Edition',
    		'Pro SQL Database for Windows Azure, 2nd Edition',
    		'Instant MinGW Starter',
    		'Implementing Splunk',
				'Development with HTML5 For Dummies',
				'TeamCity 7 Continous Integration',
				'SAP ABAP Advanced Cookbook',
				'Programming Your Home',
				'Programming Windows, 6th Edition',
				'Programming PHP, 3rd Edition',
				'Programming iOS 6, 3rd Edition',
				'Professional Visual Studio 2012',
				'Pro WPF 4.5 in VB',
				'Pro Windows 8 Development with HTML5 and JavaScript',
				'Pro HTML5 Games',

    	);

    $author = array(
    		'Gig Robot D\'acciaio',
    		'Emilio Leccaculo Fede',
    		'Artuto Brachetti',
    		'Jhon wane',
    		'Erick Pribke',
    		'Arthur Conand Doyle',
    		'Costamagna Teresa',
    		'Pippo gianni',
    		'Marco Rossi',
    	);
    
    $category_reference = array(
        'category-design',
        'category-programming',
        'category-webprogramming',
        'category-sql',
        'category-administrator',
        );

  	


    for ($i=0; $i < 20; $i++) { 
	    $ebook = new Ebook();
	    $ebook->setTitle($title[array_rand($title)]);
	    $ebook->setCategory($em->merge($this->getReference($category_reference[array_rand($category_reference)])));
        $ebook->setAuthor($author[array_rand($author)]);
	    $ebook->setIsActivated(1);
	 
	    $em->persist($ebook);
  	}
    

    $ebook1 = new Ebook();
    $ebook1->setTitle('Come evadere il fisco e dormire sonni tranquilli');
    $ebook1->setCategory($em->merge($this->getReference($category_reference[array_rand($category_reference)])));
    $ebook1->setAuthor('Tremonti Giulio');
    $ebook1->setIsActivated(1);
 
    $em->persist($ebook1);
 
    $em->flush();

  }
 
  public function getOrder()
  {
    return 2; // the order in which fixtures will be loaded
  }
}