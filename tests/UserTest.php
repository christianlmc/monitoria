<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testpaginaInicial()
    {
        $this->visit('/')
        	 ->seePageIs('/')
        	 ->see('Monitoria')
        	 ->see('Período de Inscrição')
        	 ->see('Período de Avaliação')
        	 ->see('Resultado');
    }

    public function testLoginPage()
    {
    	$this->visit('/')
    	     ->click('Login')
    	     ->seePageIs('/login');
    }

    public function testUserLogin()
    {
    	$user = factory(App\User::class)->make([
    		'name' => 'Teste',
    		'email' => 'teste@gmail.com',
            'matricula' => '120123456',
            'cpf' => '12345678999',
            'rg' => '123456',
    		'password' => bcrypt('123456'),
    		]);

    	$this->visit('/login')
    	     ->type($user->email, 'email')
    	     ->type('123456', 'password')
    	     ->press('Login')
    	     ->seePageIs('/aluno/inscricao')
    	     ->see($user->name);
    }
}
