<?php

namespace AerolineaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AerolineaBundle:Default:index.html.twig');
    }
}
