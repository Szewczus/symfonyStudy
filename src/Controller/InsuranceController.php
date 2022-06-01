<?php

namespace App\Controller;

use App\Entity\Insurance;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Stopwatch\Stopwatch;

class InsuranceController extends AbstractController
{

//    /**
//     * @Route("/saveinsurance", name="insurance_save", methods={"POST"})
//     */
//    public function saveInsurance(ManagerRegistry $doctrine, Request $request): Response
//    {
//
//        $nameConverter = new OrgPrefixNameConverter();
//        $normalizer = new ObjectNormalizer(null, $nameConverter);
//
//        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
//        $insurance = $serializer->deserialize($request->getContent(), Insurance::class, 'json');
//
//        return new Response('Kolor o podanym id:  '. $request->getContent(). "--".$insurance->getExpiration());
//    }

    /**
     * @Route("/saveinsurance", name="insurance_save" , methods={"POST"})
     */
    public function saveInsurance(ManagerRegistry $doctrine): Response
    {
        $insurance =null;
        $czasy = array();
        for($j=0; $j<50; $j++){
            $stopwatch = new Stopwatch();
            $stopwatch->openSection();
            $stopwatch->start('eventName');
            $stopwatch->lap('eventName');
            for($i=0; $i<100; $i++){
                $insurance = new Insurance();
                $date = "2000-12-31";
                $insurance->setStartDate($date);
                $insurance->setExpiration($date);
                $em = $doctrine->getManager();
                $em->persist($insurance);
            }
            $em->flush();
            $event = $stopwatch->stop('eventName');
            $stopwatch->stopSection('phase_1');
            //print_r($stopwatch);
            print_r("---------------------------------------------------------");
            $czasy[$j] = $event->getDuration();
            echo("licznik: ".$j."->".$event->getDuration()."|");
            //$this->requests[] = array('time' => $event->getDuration());
        }
        return new Response('zakoncz'.var_dump($czasy));
    }
}