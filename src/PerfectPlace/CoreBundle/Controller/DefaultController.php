<?php

namespace PerfectPlace\CoreBundle\Controller;

use PerfectPlace\CoreBundle\Entity\Particulier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

//        Famille / étudiant / personne âgé / Handicapé
        $typefield = array('famille' => 'Famille', 'etudiant' => 'étudiant', 'age' => 'personne age', 'handicape' => 'handicape');

        $form = $this->createFormBuilder()
            ->add('mobilite', 'integer')
            ->add('environement', 'integer')
            ->add('culture', 'integer')
            ->add('nocturne', 'integer')
            ->add('commerce', 'integer')
            ->add('sante', 'integer')
            ->add('type','choice', array('choices' => $typefield))
            ->add('save', 'submit')
            ->getForm();




        return $this->render('PerfectPlaceCoreBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
