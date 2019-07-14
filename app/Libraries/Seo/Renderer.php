<?php

namespace App\Libraries\Seo;

final class Renderer
{
    /**
     * Manager instance
     *
     * @var \App\Libraries\Seo\Manager
     */
    private $manager;

    /**
     * Creates a renderer instance
     *
     * @param   \App\Libraries\Seo\Manager  $manager
     * @return  void
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Converts all the data we've got so far into an HTML string
     *
     * @param   string  $glue
     * @return  string
     */
    public function print($glue = PHP_EOL)
    {
        $tags = [];

        // Basic page tags
        $title = $this->manager->getTitle();
        if (mb_strlen($title) > 0)
        {
            $tags[] = sprintf('<title>%s</title>', $title);
        }

        $description = $this->manager->getDescription();
        if (mb_strlen($description) > 0)
        {
            $tags[] = sprintf('<meta name="description" content="%s" />', htmlentities($description));
        }

        $keywords = $this->manager->getKeywords();
        if (count($keywords) > 0)
        {
            $tags[] = sprintf('<meta name="keywords" content="%s" />', array_map(function($word) {
                return htmlentities($word);
            }, $keywords));
        }

        // Open graph tags
        foreach($this->manager->getOpenGraph() as $tag => $content)
        {
            if (mb_strlen($content) > 0)
            {
                $tags[] = $this->renderGraphTag($tag, $content);
            }
        }

        // Canonical
        $tags[] = sprintf('<link rel="canonical" href="%s" />', $this->manager->getCanonicalUrl());

        return implode($glue, $tags);
    }

    /**
     * Renders OpenGraph HTML tags with some applied logic
     *
     * @param   string  $tag
     * @param   string  $content
     * @return  string
     */
    private function renderGraphTag($tag, $content)
    {
        switch($tag)
        {
            case 'fb:app_id':
                return sprintf('<meta property="%s" content="%s" />', $tag, htmlentities($content));
                break;
            default:
                return sprintf('<meta property="og:%s" content="%s" />', $tag, htmlentities($content));
                break;

        }
    }
}
