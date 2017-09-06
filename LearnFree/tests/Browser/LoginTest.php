<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
//        $user = factory(User::class)->create([
//            'email' => 'stas@email.ua',
//        ]);

        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'stas@email.ua')
                    ->pause(1000)
                    ->type('password', 'qwerty')
                    ->press('Login')
                    ->assertPathIs('/');
        });
    }
}
