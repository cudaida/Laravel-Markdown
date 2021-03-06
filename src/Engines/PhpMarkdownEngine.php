<?php

/*
 * This file is part of Laravel Markdown.
 *
 * (c) Graham Campbell <graham@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Markdown\Engines;

use Illuminate\View\Engines\PhpEngine;
use League\CommonMark\CommonMarkConverter;

/**
 * This is the php markdown engine class.
 *
 * @author Graham Campbell <graham@cachethq.io>
 */
class PhpMarkdownEngine extends PhpEngine
{
    /**
     * The markdown instance.
     *
     * @var \League\CommonMark\CommonMarkConverter
     */
    protected $markdown;

    /**
     * Create a new instance.
     *
     * @param \League\CommonMark\CommonMarkConverter $markdown
     *
     * @return void
     */
    public function __construct(CommonMarkConverter $markdown)
    {
        $this->markdown = $markdown;
    }

    /**
     * Get the evaluated contents of the view.
     *
     * @param string $path
     * @param array  $data
     *
     * @return string
     */
    public function get($path, array $data = [])
    {
        $contents = parent::get($path, $data);

        return $this->markdown->convertToHtml($contents);
    }

    /**
     * Return the markdown instance.
     *
     * @return \League\CommonMark\CommonMarkConverter
     */
    public function getMarkdown()
    {
        return $this->markdown;
    }
}
