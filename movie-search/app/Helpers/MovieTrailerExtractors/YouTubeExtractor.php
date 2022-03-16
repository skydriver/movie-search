<?php

namespace App\Helpers\MovieTrailerExtractors;

class YouTubeExtractor
{
    public static function extractTrailer(string $name, string $lang = 'en')
    {
        $name = str_replace(' ', '+', $name);
        $html = file_get_contents('http://www.youtube.com/results?search_query=' . $name . '+trailer&aq=1&hl=' . $lang);
        $matches = null;

        if($html)
        {
            if(preg_match('~<a .*?href="/watch\?v=(.*?)".*?</div>~s', $html, $matches))
            {
                return 'https://www.youtube.com/v/' . $matches[1];
            }
            else
            {
                // handle not found trailer exception
            }
        }
        else
        {
            // handle exception
        }
    }
}
