<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('EntrustSeeder');
        $this->call('UsersTableSeeder');
        $this->call('EventsTableSeeder');
        $this->call('ActivityLogTableSeeder');
        $this->call('EventRegistrationsTableSeeder');
        $this->call('PostCategoriesTableSeeder');
        $this->call('PostsTableSeeder');
        $this->call('EventCategoriesTableSeeder');
        $this->call('EventTagsTableSeeder');
        $this->call('CerfsTableSeeder');
        $this->call('KiwanisAttendeesTableSeeder');
    }

}
