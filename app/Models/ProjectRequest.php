<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectRequest extends Model
{
    use SoftDeletes;

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

    public function budgetHumanReadable()
    {
        switch($this->budget) {
            case 0:
                return app('translator')->getFromJson('Low budget');
                break;
            case 1:
                return app('translator')->getFromJson('Medium budget');
                break;
            case 2:
                return app('translator')->getFromJson('Huge budget');
                break;
        }
    }

    public function projectNeeds()
    {
        return json_decode($this->project_needs, true);
    }

    public function status()
    {
        switch ($this->status) {
            case 0:
                return app('translator')->getFromJson('New');
                break;
            case 1:
                return app('translator')->getFromJson('Old');
                break;
            case 2:
                return app('translator')->getFromJson('Completed');
                break;
        }
    }

    public function setStatus($newStatus)
    {
        switch($newStatus) {
            case 'new':
                $this->status = 0;
                break;
            case 'old':
                $this->status = 1;
                break;
            case 'completed':
                $this->status = 2;
                break;
            default:
                throw new \InvalidArgumentException("Unknown projet status '{$newStatus}'");
                break;
        }
    }
}
