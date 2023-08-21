<?php

// database/seeders/DatabaseSeeder.php

use App\Models\User;
use App\Models\Query;
use App\Models\RelevanceScore;
use App\Models\UserProfileField;
use App\Models\TeamProfileField;
use App\Models\Source;
use App\Models\SourceRestriction;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        if (!Role::exists()) {
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'user']);
        }
        // Create an admin user
        if(!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'name' => 'admin user',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
            ])->assignRole('admin');
        }
    }
}
