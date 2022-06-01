<?php

namespace App\Controller;

use App\Entity\Colour;
use App\Repository\ColourRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
class ColourController extends AbstractController
{

    /**
     * @Route("/colour/{id}", name="colour_show", methods={"GET"})
     */
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $colour = $doctrine->getRepository(Colour::class)->find($id);

        if (!$colour) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Kolor o podanym id:  '.$colour->getCarColour());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/savecolour", name="colour_save")
     */
    public function saveColour(ManagerRegistry $doctrine): Response
    {
        $colour = new Colour();
        $colour->setCarColour("karmelokowy");

//        $em = $doctrine->getManager();
//        $em->persist($colour);
//        $em->flush();
        //$doctrine->getRepository(Colour::class)->findExample($colour);
       $doctrine->getRepository(Colour::class)->add($colour, true);
        return new Response('Kolor o podanym id:  ');
    }
}