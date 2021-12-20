<?php

namespace App\Controller;

use App\Model\PeopleManager;

class PeopleController extends AbstractController
{
    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $peopleManager = new PeopleManager();
            $peopleManager->insert($_POST);
            header('Location: /');
        }
        return $this->twig->render('Home/index.html.twig');
    }

    public function show(): string
    {
        $peopleManager = new peopleManager();
        $peoples = $peopleManager->selectAll();
        return $this->twig->render('Home/index.html.twig', ['peoples' => $peoples]);
    }
}
