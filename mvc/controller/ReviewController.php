<?php

require_once '../repository/ReviewRepository.php';


/**
 * Siehe Dokumentation im DefaultController.
 */
class ReviewController
{
    public function index()
    {
        $reviewRepository = new ReviewRepository();

        $view = new View('review_index');
        $view->title = 'Reviews';
        $view->heading = 'Reviews';
        $view->reviews = $reviewRepository->readAll();
        $view->display();
    }
    public function delete()
    {
        $userRepository = new ReviewRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /review');
    }
    public function review()
    {
        $view = new View('review_create');
        $view->title = 'Create review';
        $view->heading = 'Create review';
        $view->display();
    }

    public function doReview()
    {
        if ($_POST['sendreview']) {
            $marke = $_POST['marke'];
            $modell = $_POST['modell'];
            $review = $_POST['review'];
            $image = '/images/'.time().'_'.$_FILES['image']['name'];
            $_FILES['image']['tmp_name'];
            var_dump(move_uploaded_file($_FILES['tmp_name'], $image));die;

            $reviewRepository = new ReviewRepository();
            $reviewRepository->create($marke, $modell, $review, $image);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /review');

    }

    public function upimage(){
        //image extensions allowed
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 20000)
            && in_array($extension, $allowedExts))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            }
            else
            {

                //Successfully uploaded
                echo "Your file " . $_FILES["file"]["name"] . " successfully uploaded!!<br>";
                echo "Details :";
                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

                //Display Image
                echo "<img src=uploaded/" . $_FILES["file"]["name"] . ">";

                //Uploaded image folder
                if (file_exists("uploaded/" . $_FILES["file"]["name"]))
                {
                    echo $_FILES["file"]["name"] . " already exists. ";
                }
                else
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        "uploaded/" . $_FILES["file"]["name"]);

                }
            }
        }
        else
        {
            //error message on the extension that are not allowed
            echo "Invalid file";
            $filename = preg_replace('/[^A-Z0-9]/','',$_FILES["file"]["name"]) . $extension;
            $logo = uploaded/$filename;

            //insert into database
            $strSQL = "INSERT INTO $table(name,image) VALUES('$name_file','$logo')";
            mysql_query($strSQL) or die(mysql_error());
        }
    }
}

