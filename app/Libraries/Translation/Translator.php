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

    public function trans($key, array $replace = [], $locale = null)
    {
        dd('yarr');
        return $this->get($key, $replace, $locale);
    }

    public function transChoice($key, $number, array $replace = [], $locale = null)
    {
        dd('yarr');
        return $this->laravelTranslator->transChoice($key, $number, $replace, $locale);
    }

    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        [$namespace, $group, $item] = $this->laravelTranslator->parseKey($key);

        $locales = $fallback ? $this->laravelTranslator->localeArray($locale)
                             : [$locale ?: $this->locale];

        foreach ($locales as $locale) {
            if (! is_null($line = $this->laravelTranslator->getLine(
                $namespace, $group, $locale, $item, $replace
            ))) {
                break;
            }
        }

        if (!$line) {
            $line = $this->laravelTranslator->makeReplacements(
                $this->searchTranslated($key, $locale),
                $replace
            );
        }

        return $line;
    }

    public function searchTranslated($key, $locale = null)
    {
        if (is_null($locale))
        {
            $locale = $this->laravelTranslator->getLocale();
        }

        $translation = $this->findInCache($key, $locale);
        if (is_null($translation)) {
            $translation = $this->findInDatabase($key, $locale);
            if ($translation instanceof Translation) {
                $this->cacheRepository->set($this->getCacheKey($key, $locale), $translation, 86400);
            }
        }

        if (!\is_null($translation) && $translation !== false) {
            return $translation;
        }

        return $key;
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
        $source = TranslationKey::firstOrCreate(['key' => $key]);
        if (!$source->active()) {
            return false;
        }

        $translation = $source->translations()->where('locale', '=', $locale)->first();
        if (\is_null($translation) || !$translation->isTranslated()) {
            return null;
        }

        return $translation;
    }

    /**
     * Generates an unique cache key for a given phrase
     *
     * @param string $key
     * @param string $locale
     * @return string
     */
    private function getCacheKey($key, $locale)
    {
        return 'ltsochev.translation.phrase.' . $locale . '.' . sha1($key);
    }
}
