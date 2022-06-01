<?php

namespace App\Controller;

use App\Entity\Colour;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ColourController extends AbstractController
{

    /**
     * @Route("/colour/{id}", name="colour_show")
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
}