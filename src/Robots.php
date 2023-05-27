<?php
namespace App;

use Exception;

class Robots
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url . '/robots.txt';
    }

    function checkExists(): bool {
        return (bool)file_get_contents($this->url);
    }

    function countHosts(): int {
        return substr_count(file_get_contents($this->url), 'Host:');
    }

    function validateSize(): int {
        return strlen(file_get_contents($this->url));
    }

    function checkSitemap(): bool {
        return substr_count(file_get_contents($this->url), 'Sitemap:') > 0;
    }

    function getRespondeCode(): string {
        $code = get_headers($this->url);

        return $code[0];
    }
}
