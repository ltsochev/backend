<?php

namespace App\Libraries\Translation;

use Illuminate\Database\Eloquent\Collection as LaravelCollection;

class Collection extends LaravelCollection
{
    public function active()
    {
        return $this->filter(function($model) {
            return $model->isActive();
        });
    }

    public function translated()
    {
        return $this->filter(function($model) {
            return $model->translations->count() > 0;
        });
    }
}
