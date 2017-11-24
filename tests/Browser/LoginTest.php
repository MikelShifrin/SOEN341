<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    
        /**
         * A basic browser test example.
         *
         * @return void
         */
        public function testBasicExample()
        {
            $user = factory(User::class)->create([
                'email' => 'admin@admin.com',
            ]);
    
            $this->browse(function ($browser) use ($user) {
                $browser->visit('/')
                        ->type('email', $user->email)
                        ->type('password', 'password123')
                        ->press('Sign in')
                        ->assertPathIs('/login');
        });
    }
}
