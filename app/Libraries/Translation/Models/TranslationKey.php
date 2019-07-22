<?php

namespace App\Libraries\Translation\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationKey extends Model
{
    protected $fillable = [
        'key', 'user_id', 'translated_at', 'status'
    ];

    public static function make($phrase)
    {
        return static::create([
            'key' => $phrase,
            'user_id' => 0,
        ]);
    }

    public static function findTranslation($sourceKey, $locale)
    {
        return static::active()->localeJoin($locale)->where('key', '=', $sourceKey)->first();
    }

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

    public function scopeLocaleJoin($query, $locale)
    {
        $sourceTable = (new static)->getTable();
        $translationsTable = (new Translation)->getTable();

        $query->join($translationsTable, function($join) use ($sourceTable, $translationsTable, $locale) {
            $join->on($translationsTable . '.translation_id', '=', $sourceTable . '.id')
                ->where($translationsTable . '.locale', '=', $locale);
        });
    }

    public function active()
    {
        return $this->status > 0;
    }

    private function getUserModelClass()
    {
        return config('auth.providers.users.model', \App\User::class);

    }
}
