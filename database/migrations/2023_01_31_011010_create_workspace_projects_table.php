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
        Schema::create('workspace_projects', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('workspace_id')->nullable()->references('id')->on('workspaces');

            $table->string('name');
            $table->text('description')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->enum('status', ['on-track', 'at-risk', 'off-track', 'on-hold', 'complete'])->nullable();

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
        Schema::dropIfExists('workspace_projects');
    }
};
