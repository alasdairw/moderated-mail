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
            $table->string('from');
            $table->string('recipient');
            $table->string('sender');
            $table->string('message_id');
            $table->string('reply_to_message_id')->nullable();
            $table->datetime('date');
            $table->string('cc')->nullable();
            $table->string('bcc')->nullable();
            $table->text('body_html');
            $table->text('body_plain');
            $table->integer('reply_to_id')->nullable();
            $table->text('additional_headers')->nullable();
            $table->enum('direction',['Sent','Recieved']);
            $table->enum('moderation_status',['Queued','Accepted','Rejected'])->default('Queued');
            $table->text('rejection_reason');
            $table->integer('moderated_by')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
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
