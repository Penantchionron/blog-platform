<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Content;
use App\Models\Purchase;
use App\Models\Rating;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    {  

       
            // Création des rôles si pas déjà créés
            Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
            Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        
            // Tu peux aussi appeler d'autres seeders ici si tu en as
            // $this->call(UserSeeder::class);
        // Appeler d'abord les permissions et rôles
        $this->call([
            RolePermissionSeeder::class,
        ]);

        // Créer 10 utilisateurs
        $users = User::factory(10)->create();

        // Assigner un rôle aux utilisateurs créés
        $users->each(function ($user, $index) {
            if ($index === 0) {
                $user->assignRole('admin');
            } else {
                $user->assignRole('user');
            }
        });

        // Contenus, Achats, Notes
        Content::factory(10)->create();
        Purchase::factory(10)->create();
        Rating::factory(10)->create();
    }
}
