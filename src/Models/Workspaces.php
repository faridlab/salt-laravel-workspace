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

class Workspaces extends Resources {
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
        'name',
        'description',
        'project_id',
        'organization_id',
        'start_date',
        'end_date',
        'data',
        'status',
    ];

    protected $rules = array(
        'name' => 'required|string',
        'description' => 'nullable|string',
        'project_id' => 'nullable|string',
        'organization_id' => 'nullable|string',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'data' => 'nullable|json',
        'status' => 'required|in:draft,active,archived',
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
        'name',
        'description',
        'project_id',
        'organization_id',
        'start_date',
        'end_date',
        'data',
        'status',
    );

    protected $fillable = array(
        'name',
        'description',
        'project_id',
        'organization_id',
        'start_date',
        'end_date',
        'data',
        'status',
    );
}
