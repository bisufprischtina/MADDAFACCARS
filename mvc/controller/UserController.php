<?php

require_once '../repository/UserRepository.php';


/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        Security::checkLogin();
        $userRepository = new UserRepository();

        $view = new View('user_index');
        $view->title = 'User';
        $view->heading = 'User';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user_create');
        $view->title = 'Create user';
        $view->heading = 'Create user';
        $view->display();
    }

    public function doCreate()
    {

        if ($_POST['send']) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->create($username, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        Security::checkLogin();
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }


    public function dologin()
    {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $userRepository = new UserRepository();
            $loginErfolgreich = $userRepository->login($username, $password);

            if($loginErfolgreich) {
                $_SESSION['username'] = $username;
                header('Location: /');

            }
            else
            {
              header('Location: /user/login');
            }



        }else{
          echo "neger si schwarz";
        }

    }

    public function login()
    {

        $view = new View('user_login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }

    public function doLogout()
    {
        session_destroy();
        session_unset();
        header('Location: /');
    }

}

?>