<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jan = User::create([
            'name' => 'Jan',
            'username' => 'jan',
            'password' => bcrypt('test'),
        ]);

        $jan->jobs()->create([
            'subject' => 'Jans test Job',
            'body' => 'Jans test Subject body. This is quite important stuff here!'
        ]);

        $admin = User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        $adminJob = $admin->jobs()->create([
            'subject' => 'I read your EMail!',
            'body' => 'There is no escape. WHAT?',
            'supporter_id' => $jan->id
        ]);




    }
}
