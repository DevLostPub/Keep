<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Note;
use AppBundle\Form\NoteType;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/keep", name="list")
     */
    public function listAction(Request $request){

        $repository = $this->getDoctrine()->getRepository(Note::class);

        $notes = $repository->findAll();

        return $this->render('default/notes.html.twig', ['notes' => $notes]);
    }

    /**
     * @Route("/keep/create", name="create")
     */
    public function newAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $note = new Note();
        $form = $this->createForm(NoteType::class, $note);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $note = $form->getData();
            $note->setComplete(false);
            $em->persist($note);
            $em->flush();               

            return $this->redirectToRoute('list');
        }

        return $this->render('default/create.html.twig', ['form' => $form->createView()]);
    }
}
