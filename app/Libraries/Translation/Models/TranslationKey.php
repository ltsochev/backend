<?php

namespace App\Libraries\Translation\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationKey extends Model
{
    protected $fillable = [
        'key', 'user_id', 'translated_at', 'status'
    ];

    public function author()
    {
        return $this->belongsTo($this->getUserModelClass());
    }

    public function translations()
    {
        return $this->hasMany(Translation::class, 'translation_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', '>', 0);
    }

    private function getUserModelClass()
    {
        return config('auth.providers.users.model', \App\User::class);

    }
}
