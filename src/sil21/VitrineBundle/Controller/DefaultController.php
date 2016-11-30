<?php

namespace sil21\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('sil21VitrineBundle::layout.html.twig');
    }
}
