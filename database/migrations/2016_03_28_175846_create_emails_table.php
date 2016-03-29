<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('to');
            $table->string('cc')->nullable();
            $table->string('bcc')->nullable();
            $table->text('body');
            $table->integer('reply_to_id')->nullable();
            $table->text('additional_headers')->nullable();
            $table->enum('direction',['Sent','Recieved']);
            $table->enum('moderation_status',['Queued','Accepted','Rejected'])->default('Queued');
            $table->text('rejection_reason');
            $table->integer('moderated_by')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('moderated_by')->references('id')->on('users');
            $table->index('direction');
            $table->index('moderation_status');
            $table->index('reply_to_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('emails');
    }
}
