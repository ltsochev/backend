<?php

namespace App\Libraries\Translation;

use Carbon\Carbon;
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Contracts\Translation\Translator as TranslatorContract;
use Illuminate\Translation\Translator as LaravelTranslator;
use Psr\SimpleCache\CacheInterface;

use App\Libraries\Translation\Models\TranslationKey;

final class Translator implements TranslatorContract
{
    /**
     * Instance of the original Laravel translator
     *
     * @var \Illuminate\Translation\Translator
     */
    private $laravelTranslator;

    /**
     * Instance of a cache repository
     *
     * @var \Psr\SimpleCache\CacheInterface
     */
    private $cacheRepository;

    /**
     * Creates an instance of the translator
     *
     * @param   \Illuminate\Contracts\Translation\Loader    $loader
     * @param   string  $locale
     */
    public function __construct(Loader $loader, CacheInterface $cache, $locale)
    {
        $this->cacheRepository = $cache;
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

    // @todo This is a probematic function because it will attempt to create translation
    // when the phrase is not created and the database will send critical error
    // re-evaluate this method!
    public function searchTranslated($key, array $params = [], $locale = null)
    {
        if (is_null($locale))
        {
            $locale = $this->laravelTranslator->getLocale();
        }

        $translation = $this->findInCache($key, $locale);
        if (is_null($translation))
        {
            $translation = $this->findInDatabase($key, $locale);
            if (is_null($translation))
            {
                $translation = $this->addPhrase($key);
            }

            $this->cacheRepository->set($this->getCacheKey($key, $locale), $translation, Carbon::now()->addHours(24)->endOfDay());
        }
    }

    public function addPhrase($source)
    {
        return TranslationKey::make($source);
    }

    public function addNamespace($namespace, $hint)
    {
        $this->laravelTranslator->addNamespace($namespace, $hint);
    }

    public function export($locale)
    {
        $exporter = new PhrasesExporter();
        $exporter->run($locale);
    }

    private function findInCache($key, $locale)
    {
        $cacheKey = $this->getCacheKey($key, $locale);

        return $this->cacheRepository->get($cacheKey);
    }

    private function findInDatabase($key, $locale)
    {
        return TranslationKey::findTranslation($key, $locale);
    }

    private function getCacheKey($key, $locale)
    {
        return 'ltsochev.translation.' . $locale . '.' . sha1($key);
    }
}
