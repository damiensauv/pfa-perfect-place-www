<?php

namespace PerfectPlace\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function registerAction()
    {






        return $this->render('PerfectPlaceUserBundle:Default:register.html.twig');
    }


    public function loginAction()
    {




        return $this->render('PerfectPlaceUserBundle:Default:login.html.twig');
    }

}
