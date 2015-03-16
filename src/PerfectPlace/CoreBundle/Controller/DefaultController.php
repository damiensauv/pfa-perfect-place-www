<?php

namespace PerfectPlace\CoreBundle\Controller;

use PerfectPlace\CoreBundle\Entity\Particulier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('mobilite', 'integer')
            ->add('environement', 'integer')
            ->add('culture', 'integer')
            ->add('nocturne', 'integer')
            ->add('commerce', 'integer')
            ->add('sante', 'integer')
            ->add('rayon', 'integer')
            ->add('longitude', 'text')
            ->add('latitude', 'text')
            ->add('Rechercher', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $data = $form->getData();

            $long = floatval($data['longitude']);
            $lat = floatval($data['latitude']);

            //$donne['origin'] = array(50.6355677, 3.0620463);

            $donne = array();
            $donne['origin'] = array($long, $lat);
            $donne['radius'] = $data['rayon'];
            $donne['criterias'] = array(
                'subway' => $data['mobilite'],
                'bicycle_rental' => $data['mobilite'],
                'bus'  => $data['mobilite'],
                'parking' => $data['mobilite'],
                'tramway' => $data['mobilite'],
                'recycling' => $data['environement'],
                'fountain' => $data['environement'],
                'garden' => $data['environement'],
                'park' => $data['environement'],
                'arts' => $data['culture'],
                'cinema' => $data['culture'],
                'theatre' => $data['culture'],
                'stadium' => $data['culture'],
                'museum' => $data['culture'],
                'zoo'  => $data['culture'],
                'bar'  => $data['nocturne'],
                'cafe' => $data['nocturne'],
                'fast_food' => $data['nocturne'],
                'pub'  => $data['nocturne'],
                'restaurant' => $data['nocturne'],
                'casino' => $data['nocturne'],
                'night_club' => $data['nocturne'],
                'bank' => $data['commerce'],
                'bakery' => $data['commerce'],
                'store'  => $data['commerce'],
                'mall'  => $data['commerce'],
                'supermarket' => $data['commerce'],
                'clinic' => $data['sante'],
                'doctors' => $data['sante'],
                'hospital' => $data['sante'],
                'pharmacy' => $data['sante'],
                'chemist' => $data['sante']
            );

            $json = json_encode($donne);

            $lien = "http://localhost/pfa-perfect-place-api/web/app_dev.php/api/request";
            $curl = curl_init();
            $header[] = "Content-Type: application/json";
            curl_setopt($curl, CURLOPT_URL, $lien);
            curl_setopt($curl, CURLOPT_COOKIESESSION, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

            $return = curl_exec($curl);
            curl_close($curl);

            $decode = json_decode($return , true);

            $i = 0;
            while ($decode['areas'][$i]['weight'] < 0.5)
            {
                $i = $i + 1;
            }
            $coord = array("lat" => $decode['areas'][$i]['origin'][0], "long" => $decode['areas'][$i]['origin'][1]);
            $radius = $decode['areas'][$i]['radius'];



            return $this->render('PerfectPlaceCoreBundle:Default:index.html.twig', array('form' => $form->createView(), 'coord' => $coord, 'radius' => $radius));
        }

        $coord = array("lat" => 50.6355677 , "long" =>  3.06204630000002);


        return $this->render('PerfectPlaceCoreBundle:Default:index.html.twig', array('form' => $form->createView(), 'coord' => $coord, 'radius' => 0));
    }

    public function professionnelAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('commerce', 'integer')
            ->add('transport', 'integer')
            ->add('nocturne', 'integer')
            ->add('sante', 'integer')
            ->add('culture', 'integer')
            ->add('rayon', 'integer')
            ->add('Rechercher', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
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
                }*/
        }
        return $this->render('PerfectPlaceCoreBundle:Default:professionnel.html.twig',
            array('form' => $form->createView()));
    }

}



















