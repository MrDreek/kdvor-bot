<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;

class Init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->table('products_collection', function (Blueprint $collection) {
            $collection->index(
                [
                    'name' => 'text',
                    'desc' => 'text',
                    'detail' => 'text',
                    'main_category' => 'text',
                    'ext_category' => 'text'
                ],
                'products_full_text',
                null,
                [
                    'weights' => [
                        'name' => 32,
                        'ext_category' => 16,
                        'main_category' => 16,
                        //                        'desc' => 10,
                        //                        'detail' => 8,
                    ],
                    'default_language' => 'russian',
                    'name' => 'recipe_full_text'
                ]
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
