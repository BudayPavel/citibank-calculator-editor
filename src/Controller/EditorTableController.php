<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EditorTableController extends AbstractController
{
    /**
     * @Route("/editor/table", name="editor_table")
     */
    public function index()
    {
        return $this->render('editor_table/index.html.twig', [
            'controller_name' => 'EditorTableController',
        ]);
    }
}
