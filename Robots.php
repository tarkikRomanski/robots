<?php

class Robots
{
    static function isRobots($url){
        if(is_file($url . '/robots.txt'))
            return true;
        return false;
    }

    static function countHost($url){
        $url .= '/robots.txt';
        $robotsContent = file_get_contents($url);
        return substr_count($robotsContent, 'Host:');
    }

    static function validRobotsSize($url){
        $url .= '/robots.txt';
        if(filesize($url) < 512000)
            return true;
        return false;
    }

    static function isSitemap($url){
        $url .= '/robots.txt';
        $robotsContent = file_get_contents($url);
        if(substr_count($robotsContent, 'Sitemap:') > 0)
            return true;
        return false;
    }

    static function respondeCode($url){
        $url .= '/robots.txt';
        $code = get_headers($url);
        if(substr_count($code, '200') == 0)
            return $code;
        return true;
    }
}