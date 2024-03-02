<?php

namespace App\Http\Controllers;

use App\Repositories\ShortenUrlRepositoryInterface;
use Illuminate\Http\Request;

class ShortenUrlController extends Controller
{
    private $shortenUrlRepositoryInterface;

    public function __construct(ShortenUrlRepositoryInterface $shortenUrlRepositoryInterface)
    {
        $this->shortenUrlRepositoryInterface = $shortenUrlRepositoryInterface;
    }

    public function getUrls()
    {
        $data['urls'] = customPaginate($this->shortenUrlRepositoryInterface->getUrls(), 5);
        return view('layouts.pages.urls.index', $data);
    }
}
