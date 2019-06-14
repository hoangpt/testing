<?php
echo "\n---Starting test PostService.php\n";
require_once(ABS_APP_PATH . '/Db.php');
require_once(ABS_APP_PATH . '/models/PostService.php');

$service = new PostService();
$serviceDriver = new PostServiceTest($service);
$serviceDriver->test_all();
$serviceDriver->test_find();

$serviceDriver->report();

/**
 * Test drive for PostService
 * @author hoangpt
 */
class PostServiceTest
{

    private $service;
    public $message;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function test_all()
    {
        $list = $this->service->all();

        //assert list size = 2
        $this->message .= TestUtil::assertEqual(sizeof($list), 2);
    }

    public function test_find()
    {
        $id = 1;
        $post = $this->service->find($id);

        $this->message .= TestUtil::assertEqual($post->getUserId(), 1);
        $this->message .= TestUtil::assertEqual($post->getTitle(), 'First post');
    }

    /**
     * @return mixed
     */
    public function report()
    {
        echo "\n" . $this->message;
    }

}