<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

use App\Entity\Proveidor;
use App\Form\ProveidorType;

class ProveidorsController extends AbstractController
{
    public function index(Request $request, PersistenceManagerRegistry $doctrine): Response
    {
        
        $em = $doctrine->getManager(); // Entity Manager

        // Extraiem tots els proveïdors
        $proveidorsRepo = $doctrine->getRepository(Proveidor::class);
        $proveidors = $proveidorsRepo->findAll();

        // Creació d'un nou proveïdor
        $proveidor = new Proveidor();
        $form = $this->createForm(ProveidorType::class, $proveidor);
        $form->handleRequest($request);

        // Si el formulari s'ha enviat i és vàlid
        if ($form->isSubmitted() && $form->isValid()) {

            // Assignació de dates
            $proveidor->setCreateAt(new \Datetime('now'));
            $proveidor->setEditedAt(new \Datetime('now'));

            // Desem el proveïdor
            $em->persist($proveidor);
            $em->flush(); 
            
            return $this->redirectToRoute('index'); // Anem a la ruta principal '/'
        }

        // Retorn de la vista
        return $this->render('proveidors/index.html.twig', [
            'proveidors' => $proveidors,
            'accio' => 'create',
            'form' => $form->createView()
        ]);
    }

    public function delete(Proveidor $proveidor, PersistenceManagerRegistry $doctrine) {

        // Si el proveïdor no existeix
        if (!$proveidor) {
            return $this->redirectToPath('index'); // No fem res i tornem a la vista principal '/'
        }

        $em = $doctrine->getManager(); // Entity Manager
        
        // Esborrem el proveïdor
        $em->remove($proveidor);
        $em->flush();

        return $this->redirectToRoute('index'); // Anem a la ruta principal '/'
    }

    public function edit(Request $request, Proveidor $proveidor, PersistenceManagerRegistry $doctrine) {
        
        $em = $doctrine->getManager(); // Entity Manager

        // Extraiem tots els proveïdors
        $proveidorsRepo = $doctrine->getRepository(Proveidor::class);
        $proveidors = $proveidorsRepo->findAll();

        // Edició d'un proveïdor
        $form = $this->createForm(ProveidorType::class, $proveidor);
        $form->handleRequest($request);

        // Si el formulari s'ha enviat i és vàlid
        if ($form->isSubmitted() && $form->isValid()) {

            // Actualització data d'edició
            $proveidor->setEditedAt(new \Datetime('now'));

            // Editem el proveïdor
            $em->persist($proveidor);
            $em->flush(); 
            
            return $this->redirectToRoute('index'); // Anem a la ruta principal '/'
        }

        // Retorn de la vista
        return $this->render('proveidors/index.html.twig', [
            'proveidors' => $proveidors,
            'proveidor' => $proveidor,
            'accio' => 'edit',
            'form' => $form->createView()
        ]);
    }
}
