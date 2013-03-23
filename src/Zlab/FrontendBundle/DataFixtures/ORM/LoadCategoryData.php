<?php

// src/Ens/JobeetBundle/DataFixtures/ORM/LoadCategoryData.php
namespace Zlab\FrontendBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Zlab\FrontendBundle\Entity\Category;
 
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $design = new Category();
    $design->setName('Design');
    $programming = new Category();
    $programming->setName('Programming');
    $sql = new Category();
    $sql->setName('Sql');
    $administrator = new Category();
    $administrator->setName('Sistem Administrator');
    $webprogramming = new Category();
    $webprogramming->setName('Web Programming');
 



    $em->persist($design);
    $em->persist($programming);
    $em->persist($sql);
    $em->persist($administrator);
    $em->persist($webprogramming);
 
    $em->flush();
 



    $this->addReference('category-design', $design);
    $this->addReference('category-programming', $programming);
    $this->addReference('category-sql', $sql);
    $this->addReference('category-administrator', $administrator);
    $this->addReference('category-webprogramming', $webprogramming);
  }
 
  public function getOrder()
  {
    return 1; // the order in which fixtures will be loaded
  }
}