<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormTest extends TestCase
{
	use DatabaseTransactions;
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
    	->type('password1','password')
    	->type('password1','password_confirmation')
    	->press('Register')
    	->seePageIs('/register');
    }
}
