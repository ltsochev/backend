<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    protected $table = 'project_requests';
    protected $fillable = [
        'name', 'email', 'phone', 'description', 'type', 'project_needs',
        'start_date', 'launch_date', 'status', 'ip_address', 'user_agent', 'budget'
    ];

    public function getStartDate()
    {
        if (is_null($this->start_date)) {
            return __('No huge rush');
        }

        return Carbon::parse($this->start_date)->format('d F, Y');
    }

    public function getLaunchDate()
    {
        if (is_null($this->launch_date)) {
            return app('translator')->getFromJson('No huge rush');
        }

        return Carbon::parse($this->launch_date)->format('d F, Y');
    }
}
