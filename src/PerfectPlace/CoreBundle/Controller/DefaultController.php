<?php

namespace PerfectPlace\CoreBundle\Controller;

use PerfectPlace\CoreBundle\Entity\Particulier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

/*
 *
 * Type Pro
 *
        $form = $this->createFormBuilder()
            ->add('commerce', 'integer')
            ->add('transport', 'integer')
            ->add('nocturne', 'integer')
            ->add('sante', 'integer')
             ->add('rayon', 'integer')
            ->add('save', 'submit')
            ->getForm();
*/

        /*
         * Type particulier
         */
        $typefield = array('famille' => 'Famille', 'etudiant' => 'étudiant', 'age' => 'personne age', 'handicape' => 'handicape');
        $form = $this->createFormBuilder()
            ->add('mobilite', 'integer')
            ->add('environement', 'integer')
            ->add('culture', 'integer')
            ->add('nocturne', 'integer')
            ->add('commerce', 'integer')
            ->add('sante', 'integer')
            ->add('type','choice', array('choices' => $typefield))
            ->add('rayon', 'integer')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $data = $form->getData();

            /*
                * A JSON request example :
                {
                "origin": [12, 34],
                "radius": 15,
                "criterias":
                {
                    "transport": 50,
                    "nature": 25
                 }
                }
            */


        }

        return $this->render('PerfectPlaceCoreBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}



















