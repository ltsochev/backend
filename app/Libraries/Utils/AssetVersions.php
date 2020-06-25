<?php

namespace App\Libraries\Utils;

use SplFileObject;

class AssetVersions
{
    private $files = [];
    private $enabled = true;

    public function __construct($filepath)
    {
        $this->loadFiles($filepath);
    }

    public function enabled()
    {
        return $this->enabled;
    }

    public function enable()
    {
        $this->enabled = true;

        return $this;
    }

    public function disable()
    {
        $this->enabled = false;

        return $this;
    }

    public function asset($asset)
    {
        if (!$this->enabled() || !array_key_exists($asset, $this->files)) {
            return $asset;
        }

        return $this->files[$asset];
    }

    private function loadFiles($filepath)
    {
        if (!file_exists($filepath)) {
            $this->disable();
            return;
        }

        $file = new SplFileObject($filepath, "r");
        $contents = $file->fread($file->getSize());

        $this->files = json_decode($contents, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->disable();
        }
    }
}
