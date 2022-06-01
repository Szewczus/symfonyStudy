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
     * @Route("/saveinsurance", name="insurance_save", methods={"POST"})
     */
    public function saveInsurance(ManagerRegistry $doctrine, Request $request): Response
    {

        for($i=0; $i<100; $i++){
            $insurance = new Insurance();

        }


        return new Response('Kolor o podanym id:  '. $request->getContent(). "--".$insurance->getExpiration());
    }
}