<?php

namespace App\Http\Services;

use App\Models\ShortenUrl;
use App\Repositories\ShortenUrlRepositoryInterface;
use Illuminate\Support\Str;

class ShortenUrlService implements ShortenUrlRepositoryInterface {

    private $urls = [];

    // public function __construct()
    // {
    //     $this->urls = config("testdata.urls"); // testing purpose
    // }

    public function __construct(private ShortenUrl $url){}

    public function getUrls()
    {
        return $this->url::getAllUrls();
    }

    public function storeUrl($request)
    {
        try {
            $formatForStoreUrl = [
                "title" => Str::ucfirst($request->title),
                "original_url" => $request->original_url,
                "shortener_url" => Str::random(6),
            ];

            if ($this->url::createUrl($formatForStoreUrl)) {
                return ["success", "Url Created Sucessfully!"];
            }
        } catch (QueryException | Exception $e) {
            return ["error", "Something Went Wrong. Error: ".$e->getMessage()];
        }
    }

    public function editUrl(int $id)
    {
        return $this->url::getSingleUrlByParam('id', $id);
    }

    public function updateUrl($request, int $id)
    {
        try {
            $formatForUpdateUrl = [
                "title" => Str::ucfirst($request->title),
                "original_url" => $request->original_url,
                "shortener_url" => Str::random(6),
            ];
            if ($this->url::updateUrlByParam("id", $id, $formatForUpdateUrl)) {
                return ["success", "Url Updated Sucessfully!"];
            }
        } catch (QueryException | Exception $e) {
            return ["error", "Something Went Wrong. Error: ".$e->getMessage()];
        }
    }

    public function deleteUrl(int $id)
    {
        try {
            if($this->url::deleteUrlByParam('id', $id)){
                return ["success", "Url Deleted Sucessfully!"];
            }
        } catch (QueryException | Exception $e) {
            return ["error", "Something Went Wrong. Error: ".$e->getMessage()];
        }
    }

    public function getShortenLink($shorten_url)
    {
        $obj = $this->url::getSingleUrlByParam('shortener_url', $shorten_url);
        if($obj){
            return $obj->original_url;
        }
        return false;
    }
}
