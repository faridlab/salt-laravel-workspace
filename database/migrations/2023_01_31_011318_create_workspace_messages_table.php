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
        Schema::create('workspace_messages', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('workspace_id')->nullable()->references('id')->on('workspaces');
            $table->foreignUuid('project_id')->nullable()->references('id')->on('workspace_projects');
            $table->foreignUuid('message_id')->nullable()->references('id')->on('workspace_messages');

            $table->enum('scope', ['message', 'reply'])->default('message')->nullable(); // eg: message, reply

            $table->string('subject')->nullable()->comment('subject will be blank on first message created');
            $table->text('message');

            $table->foreignUuid('created_by')->references('id')->on('users');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('users');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspace_messages');
    }
};
