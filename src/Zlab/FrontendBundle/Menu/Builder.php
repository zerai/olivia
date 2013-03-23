<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace Zlab\FrontendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');

        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('Home', array('route' => 'R_ZlabFrontendBundle_homepage'));
        
        $menu->addChild('Ebook', array('route' => 'R_ZlabFrontendBundle_homepage'))
        //$menu->setChildrenAttribute('class', 'dropdown');
            ->setAttribute('dropdown', true);
            //->setAttribute('icon', 'icon-user');
            $menu['Ebook']->addChild('Aggiungi', array('uri' => '#'))
            //->setAttribute('icon', 'icon-edit');
            ->setAttribute('divider_append', true);
            $menu['Ebook']->addChild('Logout', array('uri' => '#'));
        /*
        $menu->addChild('About Me', array(
            'route' => 'R_ZlabFrontendBundle_homepage',
            'routeParameters' => array('id' => 42)
        ));
        // ... add more children

        $menu->addChild('Projects', array('route' => 'R_ZlabFrontendBundle_homepage'))
            ->setAttribute('icon', 'icon-list');
        
        */

        return $menu;
    }


    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'navbar-link pull-right');
 
        /*
        You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.
 
        if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
        $username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user
 
        */    
        $menu->addChild('User', array('label' => 'Hi visitor'))
            //->setAttribute('class', 'icon-user')
            ->setAttribute('dropdown', true);
            //->setAttribute('icon', 'icon-user');
 
        $menu['User']->addChild('Edit profile', array('route' => 'R_ZlabFrontendBundle_homepage'));
            //->setAttribute('icon', 'icon-edit');
 
        return $menu;
    }    
}