<?php

namespace App\Libraries\Translation;

use Illuminate\Contracts\Translation\Loader;
use Illuminate\Translation\Translator as LaravelTranslator;

final class Translator
{
    /**
     * Instance of the original Laravel translator
     *
     * @var \Illuminate\Translation\Translator
     */
    private $laravelTranslator;

    /**
     * Creates an instance of the translator
     *
     * @param   \Illuminate\Contracts\Translation\Loader    $loader
     * @param   string  $locale
     */
    public function __construct(Loader $loader, $locale)
    {
        $this->laravelTranslator = new LaravelTranslator($loader, $locale);
    }

    /**
     * Sets the global app locale
     *
     * @param   string  $locale
     * @return  void
     */
    public function setLocale($locale)
    {
        $this->laravelTranslator->setLocale($locale);
    }

    /**
     * Sets the global fallback locale
     *
     * @param   string  $locale
     * @return  void
     */
    public function setFallback($locale)
    {
        $this->laravelTranslator->setFallback($locale);
    }
}
