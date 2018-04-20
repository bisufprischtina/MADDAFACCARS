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
            $image = $_POST['image'];

            $reviewRepository = new ReviewRepository();
            $reviewRepository->create($marke, $modell, $review, $image);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /review');

    }
}

?>