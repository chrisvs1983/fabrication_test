<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'fabrication.product.view',
                'name'      => 'View Product',
            ],
            [
                'slug'      => 'fabrication.product.create',
                'name'      => 'Create Product',
            ],
            [
                'slug'      => 'fabrication.product.edit',
                'name'      => 'Update Product',
            ],
            [
                'slug'      => 'fabrication.product.delete',
                'name'      => 'Delete Product',
            ],
            /*
            [
                'slug'      => 'fabrication.product.verify',
                'name'      => 'Verify Product',
            ],
            [
                'slug'      => 'fabrication.product.approve',
                'name'      => 'Approve Product',
            ],
            [
                'slug'      => 'fabrication.product.publish',
                'name'      => 'Publish Product',
            ],
            [
                'slug'      => 'fabrication.product.unpublish',
                'name'      => 'Unpublish Product',
            ],
            [
                'slug'      => 'fabrication.product.cancel',
                'name'      => 'Cancel Product',
            ],
            [
                'slug'      => 'fabrication.product.archive',
                'name'      => 'Archive Product',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/fabrication/product',
                'name'        => 'Product',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/fabrication/product',
                'name'        => 'Product',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'product',
                'name'        => 'Product',
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
                'key'      => 'fabrication.product.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
