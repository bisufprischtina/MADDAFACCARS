<?php

require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user_index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user_create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    public function doCreate()
    {
        if ($_POST['send']) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $passwort = $_POST['password'];
            
            // $password  = $_POST['password'];
            $password = 'no_password';

            $userRepository = new UserRepository();
            $userRepository->create($username, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function review()
    {
        $view = new View('review_create');
        $view->title = 'Review erstellen';
        $view->heading = 'Review erstellen';
        $view->display();
    }

    public function doReview()
    {
        if ($_POST['sendreview']) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $passwort = $_POST['password'];

            // $password  = $_POST['password'];
            $password = 'no_password';

            $userRepository = new UserRepository();
            $userRepository->create($username, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
