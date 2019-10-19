<?php

namespace App\Http\Middleware;

use Closure;

class SecurityHeaders
{
    public $rewriteHeaders = false;

    protected $except = [
		'admin/*',
		'staff/*',
		'partners/*',
		'api/v1/auth/jwt',
    ];

    protected $headers = [
        'Strict-Transport-Security' => 'max-age=31536000; includeSubdomains',
		'X-UA-Compatible' => 'IE=10,chrome=1',
		'X-XSS-Protection' => '1; mode=block',
		'X-Content-Type-Options' => 'nosniff',
        'Referrer-Policy' => 'same-origin',
        'Feature-Policy' => [
			'fullscreen' => "'self'",
			'geolocation' => "'self'",
			'microphone' => "'none'",
		],
    ];

    public function handle($request, Closure $next)
    {
        if ($this->shouldPassThrough($request))
		{
			return $next($request);
        }

        $response = $next($request);

        // Basically checking if we're dealing with Response instance
        // or something else
        if (method_exists($response, 'header'))
        {
            foreach($this->headers as $key => $value)
			{
				if (is_array($value))
				{
					$value = $this->compileHeader($value);
				}

				$response->header($key, $value, $this->rewriteHeaders);
			}
        }

        return $response;
    }

    protected function shouldPassThrough($request)
	{
		foreach($this->except as $except)
		{
			if ($except !== '/')
			{
				$except = trim($except, '/');
			}

			if ($request->is($except))
			{
				return true;
			}
		}

		return false;
    }

    protected function compileHeader(array $data)
	{
		$headerData = [];

		foreach($data as $key => $contents)
		{
			if (is_array($contents))
			{
				$contents = implode(' ', $contents);
			}

			$headerData[] = $key . ' ' . $contents;
		}

		return implode('; ', $headerData);
	}
}
