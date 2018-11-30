<?php

namespace App\Services;


use App\Models\Link;

class PathEncoderService
{

    /**
     * @var
     */
    protected $url;

    /**
     * @var array
     */
    protected $allowChars;

    /**
     * @var int
     */
    protected $slugLength = 5;

    /**
     * PathEncoderService constructor.
     */
    public function __construct()
    {
        $this->allowChars = array_merge(range('A', 'Z'), range('a', 'z'));
    }

    /**
     * @param string $url
     * @return Link
     */
    public function encode(string $url): Link
    {
        $this->url = $url;

        $link = Link::where('url', '=', $url)->first();

        if (empty($link)) {
            $link = Link::create([
                'slug' => $this->generate(),
                'url' => $url,
            ]);
        }

        return $link;
    }

    /**
     * @return string
     */
    private function generate(): string
    {
        $slug = '';

        while (strlen($slug) < 5) {
            $slug .= $this->allowChars[mt_rand(0, count($this->allowChars)-1)];
        }

        if (empty(Link::where('slug', '=', $slug)->first())) {
            return $slug;
        }

        return $this->generate();
    }

}
