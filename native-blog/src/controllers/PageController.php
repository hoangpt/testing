<?php

/**
 * Class PageController: handle layout and error page
 * @author hoangpt
 */
class PageController
{
    /**
     * page home
     * @author hoangpt
     */
    public function home()
    {
        $firstName = 'Jon';
        $lastName = 'Snow';
        require_once('views/pages/home.php');
    }

    /**
     * page error
     * @author hoangpt
     */
    public function error()
    {
        require_once('views/pages/error.php');
    }
}

?>