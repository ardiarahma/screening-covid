<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Warga']);
        Role::create(['name' => 'Perangkat Desa']);

        $admin = User::create([
            'name'      => 'Developer',
            'email'     => 'developer@dev.com',
            'password'  =>  bcrypt('devpass'),
        ]);
        $admin->assignRole('Super Admin');

        $this->call(PertanyaansTableSeeder::class);
        $this->call(HasilSkorsTableSeeder::class);
    }
}
