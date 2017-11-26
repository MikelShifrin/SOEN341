<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
