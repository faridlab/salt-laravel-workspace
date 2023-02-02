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

class WorkspaceSections extends Resources {

    protected $table = 'workspace_sections';

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
        'name',
        'description',
        'order',
        'data',
    ];

    protected $rules = array(
        'project_id' => 'required|string',
        'name' => 'required|string',
        'description' => 'nullable|string',
        'data' => 'nullable|json',
        'order' => 'nullable|integer',
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
        'name',
        'description',
        'order',
        'data',
    );

    protected $fillable = array(
        'project_id',
        'name',
        'description',
        'order',
        'data',
    );
}
