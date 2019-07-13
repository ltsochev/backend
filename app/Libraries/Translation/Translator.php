<?php

namespace App\Libraries\Translation;

use Illuminate\Contracts\Translation\Loader;
use Illuminate\Translation\Translator as LaravelTranslator;

final class Translator
{
    private $laravelTranslator;

    public function __construct(Loader $loader, $locale)
    {
        $this->laravelTranslator = new LaravelTranslator($loader, $locale);
    }

    public function setLocale($locale)
    {
        $this->laravelTranslator->setLocale($locale);
    }

    public function setFallback($locale)
    {
        $this->laravelTranslator->setFallback($locale);
    }
}
