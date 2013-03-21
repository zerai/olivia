<?php
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Zlab\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZlabFrontendBundle:Page:index.html.twig');
    }
}