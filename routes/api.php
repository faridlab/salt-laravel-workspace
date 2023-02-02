<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltWorkspace\Controllers\WorkspacesController;
use SaltWorkspace\Controllers\WorkspaceMessagesController;
use SaltWorkspace\Controllers\WorkspaceProjectsController;
use SaltWorkspace\Controllers\WorkspaceSectionsController;
use SaltWorkspace\Controllers\WorkspaceTasksController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: MESSAGES
    Route::get("workspaces/messages", [WorkspaceMessagesController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("workspaces/messages", [WorkspaceMessagesController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("workspaces/messages/trash", [WorkspaceMessagesController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("workspaces/messages/import", [WorkspaceMessagesController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("workspaces/messages/export", [WorkspaceMessagesController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("workspaces/messages/report", [WorkspaceMessagesController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("workspaces/messages/{id}/trashed", [WorkspaceMessagesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("workspaces/messages/{id}/restore", [WorkspaceMessagesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/messages/{id}/delete", [WorkspaceMessagesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("workspaces/messages/{id}", [WorkspaceMessagesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("workspaces/messages/{id}", [WorkspaceMessagesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("workspaces/messages/{id}", [WorkspaceMessagesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/messages/{id}", [WorkspaceMessagesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID


    // API: PROJECTS
    Route::get("workspaces/projects", [WorkspaceProjectsController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("workspaces/projects", [WorkspaceProjectsController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("workspaces/projects/trash", [WorkspaceProjectsController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("workspaces/projects/import", [WorkspaceProjectsController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("workspaces/projects/export", [WorkspaceProjectsController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("workspaces/projects/report", [WorkspaceProjectsController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("workspaces/projects/{id}/trashed", [WorkspaceProjectsController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("workspaces/projects/{id}/restore", [WorkspaceProjectsController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/projects/{id}/delete", [WorkspaceProjectsController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("workspaces/projects/{id}", [WorkspaceProjectsController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("workspaces/projects/{id}", [WorkspaceProjectsController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("workspaces/projects/{id}", [WorkspaceProjectsController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/projects/{id}", [WorkspaceProjectsController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID


    // API: SECTIONS
    Route::get("workspaces/sections", [WorkspaceSectionsController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("workspaces/sections", [WorkspaceSectionsController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("workspaces/sections/trash", [WorkspaceSectionsController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("workspaces/sections/import", [WorkspaceSectionsController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("workspaces/sections/export", [WorkspaceSectionsController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("workspaces/sections/report", [WorkspaceSectionsController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("workspaces/sections/{id}/trashed", [WorkspaceSectionsController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("workspaces/sections/{id}/restore", [WorkspaceSectionsController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/sections/{id}/delete", [WorkspaceSectionsController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("workspaces/sections/{id}", [WorkspaceSectionsController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("workspaces/sections/{id}", [WorkspaceSectionsController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("workspaces/sections/{id}", [WorkspaceSectionsController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/sections/{id}", [WorkspaceSectionsController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID


    // API: TASKS
    Route::get("workspaces/tasks", [WorkspaceTasksController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("workspaces/tasks", [WorkspaceTasksController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("workspaces/tasks/trash", [WorkspaceTasksController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("workspaces/tasks/import", [WorkspaceTasksController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("workspaces/tasks/export", [WorkspaceTasksController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("workspaces/tasks/report", [WorkspaceTasksController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("workspaces/tasks/{id}/trashed", [WorkspaceTasksController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("workspaces/tasks/{id}/restore", [WorkspaceTasksController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/tasks/{id}/delete", [WorkspaceTasksController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("workspaces/tasks/{id}", [WorkspaceTasksController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("workspaces/tasks/{id}", [WorkspaceTasksController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("workspaces/tasks/{id}", [WorkspaceTasksController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/tasks/{id}", [WorkspaceTasksController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID


    // API: WORKSPACES
    Route::get("workspaces", [WorkspacesController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("workspaces", [WorkspacesController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("workspaces/trash", [WorkspacesController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("workspaces/import", [WorkspacesController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("workspaces/export", [WorkspacesController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("workspaces/report", [WorkspacesController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("workspaces/{id}/trashed", [WorkspacesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("workspaces/{id}/restore", [WorkspacesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/{id}/delete", [WorkspacesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("workspaces/{id}", [WorkspacesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("workspaces/{id}", [WorkspacesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("workspaces/{id}", [WorkspacesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("workspaces/{id}", [WorkspacesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

});
