<?php

namespace SaltWorkspace\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;

use SaltLaravel\Models\Resources;

use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;

class WorkspaceTasks extends Resources {

    protected $table = 'workspace_tasks';

    use Uuids;
    use ObservableModel;

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',
        // Fields table provinces
        'id',
        'project_id',
        'section_id',
        'assignee_id',
        'task_id',
        'task',
        'description',
        'due_date',
        'order',
        'data',
    ];

    protected $rules = array(
        'project_id' => 'required|string',
        'section_id' => 'nullable|string',
        'assignee_id' => 'nullable|string',
        'task_id' => 'nullable|string',
        'task' => 'required|string',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'order' => 'nullable|integer',
        'data' => 'nullable|json',
    );

    protected $auths = array (
        'index',
        'store',
        'show',
        'update',
        'patch',
        'destroy',
        'trash',
        'trashed',
        'restore',
        'delete',
        'import',
        'export',
        'report'
    );

    protected $forms = array();
    protected $structures = array();
    protected $searchable = array(
        'project_id',
        'section_id',
        'assignee_id',
        'task_id',
        'task',
        'description',
        'due_date',
        'order',
        'data',
    );

    protected $fillable = array(
        'project_id',
        'section_id',
        'assignee_id',
        'task_id',
        'task',
        'description',
        'due_date',
        'order',
        'data',
    );
}
