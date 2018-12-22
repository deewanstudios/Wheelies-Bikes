<?php
// session_start();
class Confirmation extends Controller
{

    public function index()
    {
        // var_dump($this);
        include_once VIEWS . 'templates/core/header.php';
        var_dump($_SESSION);
        include_once VIEWS . 'templates/layouts/enquiry-confirmation-layout.php';
        include_once VIEWS . 'templates/core/footer.php';

    }
}
