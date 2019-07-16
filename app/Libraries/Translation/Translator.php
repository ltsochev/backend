<?php

namespace App\Libraries\Translation;

use Illuminate\Contracts\Translation\Loader;
use Illuminate\Contracts\Translation\Translator as TranslatorContract;
use Illuminate\Translation\Translator as LaravelTranslator;

final class Translator implements TranslatorContract
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

    public function getLocale()
    {
        return $this->laravelTranslator->getLocale();
    }

    public function getFromJson(...$arguments)
    {
        return $this->laravelTranslator->getFromJson(...$arguments);
    }

    public function trans($key, array $replace = [], $locale = NULL)
    {
        return $this->laravelTranslator->trans($key, $replace, $locale);
    }

    public function transChoice($key, $number, array $replace = [], $locale = NULL)
    {
        return $this->laravelTranslator->transChoice($key, $number, $replace, $locale);
    }
}
