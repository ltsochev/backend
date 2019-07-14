<?php

namespace App\Libraries\Seo;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

final class Manager
{
    const VERSION = "1.0.0";

    private $settings;
    private $openGraph;
    private $miscTags;
    private $request;
    private $fbAppId;
    private $keywords;

    private $title;
    private $description;
    private $canonicalUrl;

    public function __construct(array $settings = null, Request $request)
    {
        $this->request = $request;
        $this->settings = new Collection($settings);
        $this->openGraph = new Collection;
        $this->miscTags = new Collection;
        $this->keywords = [];

        $this->parseDefaults();
    }

    public function isEnabled()
	{
        return $this->settings->get('enabled', false);
	}

    public function getVersion()
	{
		return self::VERSION;
    }

    public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function getOpenGraph()
    {
        return $this->openGraph;
    }

	public function getCanonicalUrl()
	{
		return $this->canonicalUrl;
	}

	public function getFacebookAppId()
	{
		return $this->fbAppId;
    }

    public function setTitle($title)
	{
		$title = strip_tags($title);
		$this->title = $title;
		$this->openGraph->put('title', $title);
	}

	public function setSiteTitle($title)
	{
		$title = strip_tags($title);
		$this->title = $title;
	}

	public function setGraphTitle($title)
	{
		$this->openGraph->put('title', $title);
	}

	public function setDescription($description)
	{
		$description = strip_tags($description);
		$this->openGraph->put('description', $description);
		$this->description = $description;
	}

	public function setMetaDescription($description)
	{
		$description = strip_tags($description);
		$this->description = $description;
	}

	public function setGraphDescription($description)
	{
		$this->openGraph->put('description', $description);
	}

	public function setFacebookAppId($appId)
	{
		$this->fbAppId = $appId;
	}

	/**
	 * The Default of this action is "webpage"
	 *
	 * @param string $type
	 * @return  void
	 */
	public function setPageType($type)
	{
		$this->openGraph->put('type', $type);
    }

    public function setShareImage($imgSrc, $width = 450, $height = 260)
	{
		$this->openGraph->put('image', $imgSrc);
		$this->openGraph->put('image:width', $width);
		$this->openGraph->put('image:height', $height);
    }

    public function setCanonical($url)
	{
		$this->canonicalUrl = $url;
		$this->openGraph->put('url', $url);
    }

    public function addKeyword($keywords)
	{
		if ( ! is_array($keywords) )
		{
			$keywords = func_get_args();
		}

		if ( count($keywords) > 0 )
		{
			$this->keywords = array_merge($this->keywords, $keywords);
			$this->keywords = array_unique($this->keywords);
		}
    }

    public function setKeywords($keywords)
	{
		if ( ! is_array($keywords) )
		{
			$keywords = func_get_args();
		}

		if ( count($keywords) > 0 )
		{
			$this->keywords = $keywords;
			$this->keywords = array_unique($this->keywords);
		}
    }

    public function render($glue = PHP_EOL)
    {
        if ($this->isEnabled())
        {
            return (new Renderer($this))->print($glue);
        }
    }

    public function __toString()
    {
        return $this->render();
    }

    protected function parseDefaults()
    {
        $defaults = $this->settings->get('defaults', []);

		$this->setTitle(Arr::get($defaults, 'title', $this->getSiteName()));
		$this->setDescription(Arr::get($defaults, 'description'));
		$this->addKeyword(Arr::get($defaults, 'keywords', []));
		$this->setCanonical($this->request->fullUrl());

		foreach(Arr::get($defaults, 'open_graph', []) as $key => $value)
		{
			$this->openGraph->put($key, $value);
		}
    }

    private function getSiteName()
    {
        return $this->settings->get('site_name', $this->request->getHttpHost());
    }
}
