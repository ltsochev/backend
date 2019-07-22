<?php

namespace App\Libraries\Translation\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'translation_id', 'locale', 'translated'
    ];

    public static function make(TranslationKey $source, $locale, $translatedStr)
    {
        $model = static::firstOrCreate([
            'translation_id'    => $source->id,
            'locale'            => $locale
        ]);

        $model->translated = $translatedStr;

        $model->save();

        return $model;
    }

    public function source()
    {
        $this->belongsTo(TranslationKey::class);
    }

    public function isTranslated()
    {
        return mb_strlen($this->translated) > 0;
    }

    public function __toString()
    {
        return $this->isTranslated() ? $this->translated : $this->source->key;
    }
}
