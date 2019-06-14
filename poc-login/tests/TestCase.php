<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreateTestApp;

    protected function loadDataFromStubs($path){
        return json_decode(file_get_contents($path));
    }
}
