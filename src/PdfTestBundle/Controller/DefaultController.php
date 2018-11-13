<?php

namespace PdfTestBundle\Controller;
//namespace Spipu\Html2Pdf;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Spipu\Html2Pdf\Html2Pdf;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PdfTestBundle:Default:index.html.twig');
    }

    public function pdfAction(){
        $users = $this->getDoctrine()->getRepository('CrudBundle:User')->findAll();

        $template = $this->renderView('PdfTestBundle:Default:listuser.html.twig',['users' => $users]);
        
        $html2pdf = new Html2Pdf('P','A4','fr',true,'UTF-8',array(10,15,10,15));
        //$html2pdf->create('P','A4','fr',true,'UTF-8',array(10,15,10,15));

        return $html2pdf->generatePdf($template,'users');

    }
}
