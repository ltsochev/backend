<?php

namespace App\Support;

/**
 * Creates an instance of the SEO manager to allow
 * simple SEO tag rendering like title, description,
 * facebook share image etc
 *
 * @return  \App\Libraries\Seo\Manager
 */
function seo()
{
    return app('ltsochev.seo');
}

function schemaOrg()
{
    return app(\App\Libraries\Schema\Manager::class);
}

/**
 * Determines if the current user's agent is a crawler bot
 * with a simple RegEx expression
 *
 * @return bool
 */
function is_bot()
{
	return (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT']));
}

/**
 * Creates a Carbon DateTime instance and retrieves it
 *
 * @param   string  $tz
 * @return  \Carbon\Carbon
 */
function now($tz = null)
{
    return Carbon\Carbon::now($tz);
}

/**
 * Determine if the current request URI matches a pattern and return $active
 * on success or NULL on false
 *
 * @param   mixed   $path
 * @param   string  $active
 * @param   bool    $forced
 * @return  string|NULL
 */
function set_active($path, $active = 'active', $forced = false)
{
    if ($forced) { return $active; }

    return call_user_func_array('Request::is', (array)$path) ? $active : null;
}


/**
 * Converts a boolean-ish string into PHP boolean
 *
 * @param  string $string
 * @return bool
 */
function convert_boolean($string)
{
	$bool = filter_var($string, FILTER_VALIDATE_BOOLEAN);

	return $bool === true;
}

/**
 * Checkes whether $compareArray as all the required keys
 * from $requiredValues array
 *
 * @param   array   $requiredValues
 * @param   array   $compareArray
 * @return  bool
 */
function array_has_required(Array $requiredValues, Array $compareArray)
{
	return ( count(array_intersect_key(array_flip($requiredValues), $compareArray)) === count($requiredValues) );
}

/**
 * Parses the given URL and adds query variables to
 * it while respecting the question mark or ampersand
 * symbols at the end of the URL
 *
 * @param   string  $url
 * @param   array   $params
 * @return  string
 */
function url_query($url, array $params = [])
{
    if (count($params) == 0) { return $url; }

    $queryParams = [];
    $parsedUrl = parse_url($url);
    $queryStr = \Illuminate\Support\Arr::get($parsedUrl, 'query');
    parse_str($queryStr, $queryParams);

    $httpParams = array_merge($queryParams, $params);
    $urlPath = \Illuminate\Support\Arr::get($parsedUrl, 'path', '/');

    return url($urlPath . '?' . http_build_query($httpParams));
}
