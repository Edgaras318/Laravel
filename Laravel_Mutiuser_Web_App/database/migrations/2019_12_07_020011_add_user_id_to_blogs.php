<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {Schema::defaultStringLength(191);
        Schema::table('blogs', function ($table) 
        {
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function ($table) {
            $table->dropColumn('user_id');
        });
    }
}
