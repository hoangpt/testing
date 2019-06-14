<?php

echo "\n\n---Starting test PostControllerTest.php\n";

require_once(ABS_APP_PATH . '/models/PostMockService.php');
require_once(ABS_APP_PATH . '/controllers/PostController.php');

$mockService = new PostMockService();

$controller = new PostController($mockService);
$controllerDriver = new PostControllerTest($controller);
$controllerDriver->test_index();
$controllerDriver->test_show_with_valid_id();
$controllerDriver->test_show_with_invalid_id();

$controllerDriver->report();

class PostControllerTest{

    public $message;
    private $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function test_index()
    {
        //test logic, assure that call service->all 1 times
        $this->controller->index();
        $mockService = $this->controller->service;
        $this->message .= TestUtil::assertEqual($mockService->result, 'hoho');

    }

    public function test_show_with_valid_id()
    {

    }

    public function test_show_with_invalid_id()
    {


    }

    public function report(){
        echo $this->message;
    }


}