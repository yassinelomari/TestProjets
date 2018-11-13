<?php

namespace CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CrudBundle\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CrudBundle:Default:index.html.twig');
    }
    
    
    
    public function addUserAction($login,$mdp){
        $user1 = new User();
        $user1->setLogin($login);
        $user1->setMdp($mdp);     
        $mg = $this->getDoctrine()->getManager();
        $mg->persist($user1);
        $mg->flush();
        return $this->render('CrudBundle:Default:adduser.html.twig', array('user' => $user1));
    }

    public function listuserAction(){
        $users = $this->getDoctrine()->getRepository('CrudBundle:User')->findAll();
        return $this->render('CrudBundle:Default:listuser.html.twig', array('users' => $users));
    }

    public function deleterowsAction(){
        $ids = array(11,13,14);
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('CrudBundle:User');
        foreach ($ids as $id){
            $user = $rep->find($id);
            if(!is_null($user)){
                $em->remove($user);

            }
        }
        $em->flush();

        return new response('changes was saved');
    }
}
