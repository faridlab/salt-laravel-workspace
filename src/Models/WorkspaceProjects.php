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

class WorkspaceProjects extends Resources {
    protected $table = 'workspace_projects';

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
        'workspace_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    protected $rules = array(
        'workspace_id' => 'required|string',
        'name' => 'required|string',
        'description' => 'nullable|string',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'status' => 'required|in:on-track,at-risk,off-track,on-hold,complete',
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
        'workspace_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
    );

    protected $fillable = array(
        'workspace_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
    );
}
