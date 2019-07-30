<?php

namespace App\Libraries\Schema;

use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\BaseType;
use Illuminate\Support\HtmlString;

final class Manager
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add(BaseType $item)
    {
        $this->items[] = $item;
    }

    public function render()
    {
        if (count($this->items) == 0) {
            return null;
        }

        $stringBuilder = \array_map(function(BaseType $item) {
            return $item->toScript();
        }, $this->items);

        return new HtmlString(implode(PHP_EOL, $stringBuilder));
    }
}
