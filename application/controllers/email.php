<?php

class email extends controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        include_once TEMPLATES . 'core/header.php';
        include_once APP . 'email/admin-email-layout.php';
        include_once TEMPLATES . 'core/footer.php';
        return $message;

    }
}
