

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('query_city');
            $table->timestamp('query_date')->useCurrent();
            $table->boolean('query_status');
            $table->json('query_results')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queries');
    }
}

