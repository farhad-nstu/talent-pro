<?php

namespace App\Http\Services;

use App\Repositories\ShortenUrlRepositoryInterface;

class ShortenUrlService implements ShortenUrlRepositoryInterface {

    private $urls = [];

    public function __construct()
    {
        $this->urls = config("testdata.urls");
    }

    public function getUrls()
    {
        return $this->urls ?? [];
    }

    public function createUrl()
    {

    }

    public function storeUrl($request)
    {

    }

    public function editUrl(int $id)
    {

    }

    public function updateUrl($request, int $id)
    {

    }

    public function deleteUrl(int $id)
    {

    }
}
