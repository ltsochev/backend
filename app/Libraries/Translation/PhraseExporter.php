<?php

namespace App\Libraries\Translation;

use Illuminate\Support\Facades\Storage;
use App\Libraries\Translation\Models\Translation;
use App\Libraries\Translation\Models\TranslationKey;

final class PhrasesExporter
{
    private $savePath;

    public function __construct($savePath = null)
    {
        if (is_null($savePath)) {
            $savePath = __DIR__ . '/Translations';
        }

        $this->savePath = rtrim($savePath, '/');
    }

    public function run($locale)
    {
        $store = [];
        $sourceTable = (new TranslationKey)->getTable();
        $translationsTable = (new Translation)->getTable();

        TranslationKey::active()
            ->join($translationsTable, function($join) use ($sourceTable, $translationsTable, $locale) {
                $join->on($translationsTable . '.translation_id', '=', $sourceTable . '.id')
                    ->where($translationsTable . '.locale', '=', $locale);
            })->chunk(150, function($phrases) use ($store) {
                foreach ($phrases as $row) {
                    $store[$row->key] = $row->translated;
                }
        });

        if (count($store) > 0) {
            $filepath = $this->getFilePath($locale);

            Storage::put($filepath, json_encode($store, JSON_NUMERIC_CHECK));
        }

        return $store;
    }

    public function exportAll(array $localeList = [])
    {
        foreach($localeList as $locale)
        {
            $this->run($locale);
        }
    }

    public function getFilePath($locale)
    {
        return sprintf('%s/%s.json', $this->savePath, $locale);
    }
}
