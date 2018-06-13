<?php

use Illuminate\Database\Seeder;
use App\User;

use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lipsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pellentesque ipsum nisl, a tincidunt nibh sagittis eu. Aenean metus nulla, molestie id diam sed, fringilla pharetra justo. Maecenas hendrerit laoreet ipsum at gravida. Donec ut maximus augue. Sed blandit posuere purus, et euismod sapien accumsan ac. Proin tellus odio, sollicitudin ac ligula non, porttitor maximus nisi. Fusce eleifend neque sit amet lorem molestie, non imperdiet nisi ultrices. Donec risus augue, tempus ut sapien vel, tincidunt porttitor massa. Duis ac efficitur libero. Ut interdum at nisi at consectetur. Aliquam non convallis purus.';

        // Create the Administrator Role

        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Administrator';
        $adminRole->save();

        // Create the Administrator User

        $admin = User::create([
            'name' => 'Administrator',
            'username' => 'jo1006',
            'password' => bcrypt('admin'),
        ]);

        // Attach Role to it

        $admin->attachRole($adminRole);

        // Create a standard User

        $jan = User::create([
            'name' => 'Jan',
            'username' => 'jo34',
            'password' => bcrypt('test'),
        ]);

        // Create some test Jobs

        $jan->jobs()->create([
            'subject' => 'Jans test Job',
            'body' => 'Jans test Subject body. This is quite important stuff here!'
        ]);

        $adminJob = $admin->jobs()->create([
            'subject' => 'Stuff broke, yo.',
            'body' => 'Did you try turning it off and back on again?',
            'supporter_id' => $jan->id
        ]);

        $subjects = [
            'Printer doesnt work',
            'Server folder access for john doe',
            'Add john doe to the mailing list',
            'Mail account is over quota',
            'Outlook crashes frequently',
            'Name of a random person',
            'Room 01032'
        ];

        foreach ($subjects as $subject)
        {
            $job = $jan->jobs()->create([
                'subject' => $subject,
                'body' => $lipsum
            ]);

            // 50% chance of being supported
            if(mt_rand(0,1))
                $job->supporter_id = $jan->id;

            $job->save();
        }
    }
}
