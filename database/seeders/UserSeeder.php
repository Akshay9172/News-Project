<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        $adminPermissions = User::adminDefaultPermissions();
        $role = Role::whereName('admin')->first();
        //create Admin
        $user = new User();
        $user->first_name = "Super";
        $user->last_name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt("12345678");
        $user->mobile = "1234567890";
        $user->slug = Str::slug("Super Admin");
        $user->status = "1";
        $user->save();
        //Assign Role & Permission
        $user->assignRole("admin");
        $user->givePermissionTo($adminPermissions);

        //Repoter
        $repoterPermissions = User::repoterDefaultPermissions();
        $role = Role::whereName('repoter');
        //create repoter
        $user = new User();
        $user->first_name = "Repoter";
        $user->last_name = "";
        $user->email = "repoter@gmail.com";
        $user->password = bcrypt("12345678");
        $user->mobile = "1234567890";
        $user->slug = Str::slug("Repoter");
        $user->save();
        //Assign Role & Permission
        $user->assignRole("repoter");
        $user->givePermissionTo($repoterPermissions);
    }
}
