<?php
//includeFile('BaseClass.php');
use function Composer\Autoload\includeFile;use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BrontoApiTest extends TestCase {

    ///**
    // * The base URL to use while testing the application.
    // *
    // * @var string
    // */
    //protected $baseUrl = 'http://localhost';
    //
    //
    ///**
    // * Creates the application.
    // *
    // * @return \Illuminate\Foundation\Application
    // */
    //public function createApplication()
    //{
    //    $app = require __DIR__.'/../../../bootstrap/app.php';
    //
    //    $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
    //
    //    return $app;
    //}

	/** @test */
	public function it_should_create_a_contact_with_given_email_address()
	{
        $this->assertEquals('true', 'true');
	}



}
