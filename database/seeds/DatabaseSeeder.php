<?php

use App\Coment;
use App\Companie;
use App\Employee;
use App\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Companie::class, 10)->create();
        factory(App\Post::class, 5)->create();
        factory(App\Employee::class, 40)->create();
        factory(App\Coment::class, 100)->create();
    }
}
