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
        Schema::create('workspace_tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('project_id')->references('id')->on('workspace_projects');
            $table->foreignUuid('section_id')->nullable()->references('id')->on('workspace_sections');
            $table->foreignUuid('assignee_id')->nullable()->references('id')->on('users');
            $table->foreignUuid('task_id')->nullable()->references('id')->on('workspace_tasks')->commnect('as subtask');

            $table->string('task');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->tinyInteger('order')->default(0);
            $table->json('data')->nullable();

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
        Schema::dropIfExists('workspace_tasks');
    }
};
