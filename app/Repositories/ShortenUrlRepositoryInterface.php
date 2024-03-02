<?php

namespace App\Repositories;

interface ShortenUrlRepositoryInterface
{
    public function getUrls();
    public function storeUrl($request);
    public function editUrl(int $id);
    public function updateUrl($request, int $id);
    public function deleteUrl(int $id);
    public function getShortenLink($shorten_url);
}
