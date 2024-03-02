<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UrlCreateRequest;
use App\Http\Requests\UrlEditRequest;
use App\Repositories\ShortenUrlRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ShortenUrlController extends Controller
{
    private $shortenUrlRepositoryInterface;

    public function __construct(ShortenUrlRepositoryInterface $shortenUrlRepositoryInterface){
        $this->shortenUrlRepositoryInterface = $shortenUrlRepositoryInterface;
    }

    public function createShortenUrl(UrlCreateRequest $request){
        $response = [];
        try {
            [$statusName, $message] = $this->shortenUrlRepositoryInterface->storeUrl($request);
            $response['shorten_url'] = $this->shortenUrlRepositoryInterface->getShortenLinkByOriginalUrl($request->original_url);
            $response['message'] = $message;
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response['message'] = $th;
            return response()->json($response, 500);
        }
    }
}
