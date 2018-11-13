<?php

namespace TestRoutingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TestRoutingBundle:Default:index.html.twig');
    }
}
