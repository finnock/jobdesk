<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->enum('urgency', ['urgent', 'short-term', 'long-term'])->default('short-term');
            $table->string('subject', 100);
            $table->text('body');
            $table->integer('supporter_id')->nullable()->default(NULL);
            $table->enum('status', ['unread', 'processing', 'completed', 'longterm'])->default('unread');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
