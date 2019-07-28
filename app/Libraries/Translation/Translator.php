<?php

namespace App\Libraries\Translation;

use Carbon\Carbon;
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Contracts\Translation\Translator as TranslatorContract;
use Illuminate\Translation\Translator as LaravelTranslator;
use Illuminate\Support\Arr;
use Psr\SimpleCache\CacheInterface;

use App\Libraries\Translation\Models\TranslationKey;

final class Translator extends LaravelTranslator
{
    /**
     * Instance of a cache repository
     *
     * @var \Psr\SimpleCache\CacheInterface
     */
    private $cacheRepository;

    public function __construct(Loader $loader, CacheInterface $cache, $locale)
    {
        parent::__construct($loader, $locale);

        $this->cacheRepository = $cache;
    }

    public function getFromJson($key, array $replace = [], $locale = null)
    {
        $locale = $locale ?: $this->getLocale();

        $this->load('*', '*', $locale);

        $line = $this->loaded['*']['*'][$locale][$key] ?? null;

        if (!isset($line)) {
            $fallback = $this->get($key, $replace, $locale);

            if ($fallback !== $key) {
                return $fallback;
            }
        }

        return $this->makeReplacements($line ?: $key, $replace);
    }

    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        [$namespace, $group, $item] = $this->parseKey($key);


        $locales = $fallback ? $this->localeArray($locale)
        : [$locale ?: $this->locale];

        foreach ($locales as $allowedLocale) {
            if (! is_null($line = $this->getLine(
                $namespace, $group, $allowedLocale, $item, $replace
            ))) {
                break;
            }
        }

        if (!$line) {
            $line = $this->makeReplacements(
                $this->searchTranslated($key, $locale),
                $replace
            );
        }

        return $line;
    }

    public function searchTranslated($key, $locale = null)
    {
        $locale = $locale ?: $this->getLocale();

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

    public function all()
    {
        return TranslationKey::with('translations')->orderBy('id', 'DESC')->get();
    }

    public function getModelInstance()
    {
        return new TranslationKey();
    }

    public function export($locale)
    {
        $exporter = new PhrasesExporter();
        $exporter->run($locale);
    }

    public function clearCache($key, $locale)
    {
        $cacheKey = $this->getCacheKey($key, $locale);

        $this->cacheRepository->delete($cacheKey);
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
