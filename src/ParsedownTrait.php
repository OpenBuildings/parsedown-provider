<?php

namespace Clippings\ParsedownProvider;

trait ParsedownTrait
{
    /**
     * Convert Markdown to HTML
     *
     * @param  string $markdown Markdown source
     * @return string HTML output
     */
    public function parsedown($markdown)
    {
        return $this['parsedown']->text($markdown);
    }
}
