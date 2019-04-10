<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYarnthreadIdToComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('comments', function ( $table) {
           $table->integer('yarn_threads_id');

       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       Schema::table('comments', function ( $table) {
           $table->dropColumn('yarn_threads_id');
         });
       }
}
