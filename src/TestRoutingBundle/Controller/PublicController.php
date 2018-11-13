<?php

namespace TestRoutingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PublicController extends Controller
{
    public function indexAction()
    {
        return $this->render("TestRoutingBundle:Default:tstr.html.twig");
    }
}