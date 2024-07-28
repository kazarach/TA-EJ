<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
  
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('123456'),
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => bcrypt('123456'),
                'role' => 'user',
            ],
            [
                'name' => 'Kaza',
                'username' => 'kaza',
                'email' => 'kaza@example.com',
                'password' => bcrypt('123456'),
                'role' => 'admin',
            ],
            [
                'name' => 'Inventory',
                'username' => 'inventory',
                'email' => 'inventory@example.com',
                'password' => bcrypt('123456'),
                'role' => 'inventory',
            ],
            [
                'name' => 'Marketing',
                'username' => 'marketing',
                'email' => 'marketing@example.com',
                'password' => bcrypt('123456'),
                'role' => 'marketing',
            ],
            [
                'name' => 'Production',
                'username' => 'production',
                'email' => 'production@example.com',
                'password' => bcrypt('123456'),
                'role' => 'production',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            $role = Role::where('name', $userData['role'])->first();
            $user->roles()->attach($role);
        }
    }
}