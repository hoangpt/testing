<?php
/**
 * router function
 * @author hoangpt
 */
// we're adding an entry for the new controller and its actions
$controllers = array(
    'page' => ['home', 'error'],
    'post' => ['index', 'show']
);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('page', 'error');
    }
} else {
    call('page', 'error');
}

/**
 * @param $controller
 * @param $action
 */
function call($controller, $action)
{
    //TODO: should use autoloading
    require_once('controllers/' . ucwords($controller) . 'Controller.php');

    switch ($controller) {
        case 'page':
            $controller = new PageController();
            break;
        case 'post':
            // call to service to get data
            require_once('models/' . ucwords($controller). 'Service.php');

            $service = new PostService();
            $controller = new PostController($service);
            break;
    }

    $controller->{$action}();
}