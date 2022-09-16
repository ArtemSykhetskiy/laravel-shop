<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if(!Schema::hasColumn('users', 'role_id')){
                    $table->unsignedBigInteger('role_id')->after('id');

                    $table->foreign('role_id')
                        ->references('id')
                        ->on('roles');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if(Schema::hasColumn('users', 'role_id')){
                $table->dropConstrainedForeignId('role_id');
            }
        });
    }
};
