<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'home',
            'news', 'show-blog',
            'create-news', 'store-news', 'news-list',
            'languages', 'create-languages',
            'add-category', 'show-category', 'delete-category',
            'contact-us', 'contact-uss', 'show-contactus', 'delete-contactus',

        ];
        foreach ($permissions as $p) {
            Permission::create(['name' => $p]);
        }
    }
}
