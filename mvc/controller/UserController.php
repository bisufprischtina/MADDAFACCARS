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


    public function dologin()
    {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            mysql_connect("localhost", "root", "");
            mysql_select_db("maddafaccars");
            $result = mysql_query("select * from benutzer");
            while ($row = mysql_fetch_array($result)) {

                $users = $row['benutzername'];
                $pass = $row['passwort'];

                if ($user == $username && $pass == $password) {
                    echo "Welcome $username ";
                } else {
                    echo "Wrong Username or password";
                }

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

}

?>