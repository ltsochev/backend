<?php

namespace App\Libraries\Translation\Middleware;

use Closure;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;

class SetLocaleMiddleware
{
    /**
     * List of valid locale types
     *
     * @var array
     */
    private const ALLOWED_LOCALES = ['en', 'bg'];

    /**
     *  Laravel's IoC container
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $app;

    /**
     * Creates an instance of the middleware
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handles the incoming request
     *
     * @param mixed $request
     * @param \Closure $next
     */
    public function handle($request, Closure $next)
    {
        if (php_sapi_name() == 'cli') {
            return $next($request);
        }

        if (!session()->has('locale')) {
            $this->detectLocaleByIp($request);
        }

        $locale = mb_strtolower($request->get('lang'));

        if (!is_null($locale) &&
            in_array($locale, self::ALLOWED_LOCALES) &&
            $locale !== session()->get('locale')) {
            session()->put('locale', $locale);
            session()->save();
        }

        $this->app->setLocale(session()->get('locale'));

        return $next($request);
    }

    /**
     * Detects the locale by the client's IP address
     * and saves it into the session
     *
     * @param mixed $request
     * @return void
     */
    private function detectLocaleByIp($request)
    {
        $ip = $request->ip();
        $locale = config('app.fallback_locale');
        $databasePath = storage_path('app/GeoLite2-Country.mmdb');

        try {
            $reader = new Reader($databasePath);
            $record = $reader->country($ip);
            $locale = strtolower($record->country->isoCode);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        session()->put('locale', $locale);
    }
}
