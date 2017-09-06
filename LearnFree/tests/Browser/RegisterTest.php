<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
//                    ->pause(1000)
//                    ->clickLink('Регистрация')
                    ->pause(1000)
                    ->type('name', 'test1')
                    ->pause(1000)
                    ->type('email', 'test1@email.ua')
                    ->pause(1000)
                    ->type('password', 'qwerty')
                    ->pause(1000)
                    ->type('password_confirmation', 'qwerty')
                    ->pause(1000)
                    ->press('Register')
                    ->pause(1000)
                    ->assertPathIs('/');
        });
    }
}
