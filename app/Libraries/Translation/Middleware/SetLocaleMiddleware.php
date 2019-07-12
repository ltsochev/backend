<?php

namespace App\Libraries\Translation\Middleware;

use Closure;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;

class SetLocaleMiddleware
{
    private const ALLOWED_LOCALES = ['en', 'bg'];
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle($request, Closure $next)
    {
        if (!session()->has('locale'))
        {
            $this->detectLocaleByIp($request);
        }

        if ($request->has('lang') && in_array($request->get('lang'), self::ALLOWED_LOCALES) && $request->get('lang') != session()->get('locale'))
        {
            session()->put('locale', $request->get('lang'));
        }

        $this->app->setLocale(session()->get('locale'));

        return $next($request);
    }

    private function detectLocaleByIp($request)
    {
        $locale = config('app.fallback_locale');
        $databasePath = storage_path('app/GeoLite2-Country.mmdb');

        try {
            $reader = new Reader($databasePath);
            $record = $reader->country(request()->ip());
            $locale = strtolower($record->country->isoCode);
        } catch(\Exception $e) {
            \Log::error($e);
        }

        session()->put('locale', $locale);
    }
}
