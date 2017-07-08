<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('materials')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'fabrication.material.view',
                'name'      => 'View Material',
            ],
            [
                'slug'      => 'fabrication.material.create',
                'name'      => 'Create Material',
            ],
            [
                'slug'      => 'fabrication.material.edit',
                'name'      => 'Update Material',
            ],
            [
                'slug'      => 'fabrication.material.delete',
                'name'      => 'Delete Material',
            ],
            /*
            [
                'slug'      => 'fabrication.material.verify',
                'name'      => 'Verify Material',
            ],
            [
                'slug'      => 'fabrication.material.approve',
                'name'      => 'Approve Material',
            ],
            [
                'slug'      => 'fabrication.material.publish',
                'name'      => 'Publish Material',
            ],
            [
                'slug'      => 'fabrication.material.unpublish',
                'name'      => 'Unpublish Material',
            ],
            [
                'slug'      => 'fabrication.material.cancel',
                'name'      => 'Cancel Material',
            ],
            [
                'slug'      => 'fabrication.material.archive',
                'name'      => 'Archive Material',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/fabrication/material',
                'name'        => 'Material',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/fabrication/material',
                'name'        => 'Material',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'material',
                'name'        => 'Material',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'key'      => 'fabrication.material.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
