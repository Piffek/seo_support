<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFormLoginBeforeLogin()
    {

    	$this->visit('/')
    	->click('Logowanie')
    	->type('example@gmail.com','email')
    	->type('abcd','password')
    	->press('Login');
    }
    
    public function testFormRegisterBeforeLogin()
    {
    
    	$this->visit('/')
    	->click('Rejestracja')
    	->type('test','name')
    	->type('abcd@test.pl','email')
    	->type('pass','password')
    	->type('','password_confirmation')
    	->press('Register');
    }
}
