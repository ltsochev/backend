<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRequests extends Model
{
    protected $table = 'project_requests';
    protected $fillable = [
        'name', 'email', 'phone', 'description', 'type', 'project_needs',
        'start_date', 'launch_date', 'ip_address', 'user_agent'
    ];
}
