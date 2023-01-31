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
        Schema::create('workspaces', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->text('description')->nullable();

            // TODO: Workspace must be independent in the future
            $table->foreignUuid('project_id')->nullable()->references('id')->on('projects');
            $table->foreignUuid('organization_id')->nullable()->references('id')->on('organizations');

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->json('data')->nullable();

            $table->enum('status', ['draft', 'active', 'archived'])->default('active');

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
        Schema::dropIfExists('workspaces');
    }
};
