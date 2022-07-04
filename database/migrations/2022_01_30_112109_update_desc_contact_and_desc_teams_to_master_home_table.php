<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDescContactAndDescTeamsToMasterHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_home', function (Blueprint $table) {
            $table->text('desc_contact')->after('desc_blog')->nullable();
            $table->text('desc_teams')->after('desc_contact')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_home', function (Blueprint $table) {
            //
        });
    }
}
