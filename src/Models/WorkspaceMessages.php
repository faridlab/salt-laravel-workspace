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

class WorkspaceMessages extends Resources {
    protected $table = 'workspace_messages';

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
        'project_id',
        'message_id',
        'task_id',
        'scope',
        'subject',
        'message',
    ];

    protected $rules = array(
        'workspace_id' => 'nullable|string',
        'project_id' => 'nullable|string',
        'message_id' => 'nullable|string',
        'task_id' => 'nullable|string',
        'scope' => 'nullable|in:message,reply',
        'subject' => 'nullable|string',
        'message' => 'required|string',
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
        'project_id',
        'message_id',
        'task_id',
        'scope',
        'subject',
        'message',
    );

    protected $fillable = array(
        'workspace_id',
        'project_id',
        'message_id',
        'task_id',
        'scope',
        'subject',
        'message',
    );
}
