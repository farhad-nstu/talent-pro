<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UrlCreateRequest;
use App\Http\Requests\UrlEditRequest;
use App\Repositories\ShortenUrlRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert;

class ShortenUrlController extends Controller
{
    private $shortenUrlRepositoryInterface;

    public function __construct(ShortenUrlRepositoryInterface $shortenUrlRepositoryInterface){
        $this->shortenUrlRepositoryInterface = $shortenUrlRepositoryInterface;
    }

    public function getUrls(){
        $data['title'] = 'URL LIST';
        $data['urls'] = customPaginate($this->shortenUrlRepositoryInterface->getUrls(), 2);
        return view('layouts.pages.urls.index', $data);
    }
    
    public function createUrl(){
        $data['title'] = 'URL CREATE';
        return view('layouts.pages.urls.create', $data);
    }

    public function storeUrl(UrlCreateRequest $request){
        try {
            [$statusName, $message] = $this->shortenUrlRepositoryInterface->storeUrl($request);
            Alert::success($message, true);
            return redirect()->route('shortenUrls.getUrls');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function editUrl($id){
        $data['title'] = 'URL EDIT';
        $data['url'] = $this->shortenUrlRepositoryInterface->editUrl($id);
        return view('layouts.pages.urls.edit', $data);
    }

    public function updateUrl(UrlEditRequest $request, $id){
        try {
            [$statusName, $message] = $this->shortenUrlRepositoryInterface->updateUrl($request, $id);
            Alert::success($message, true);
            return redirect()->route('shortenUrls.getUrls');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function deleteUrl(Request $request){
        try {
            $data = [];
            [$statusName, $message] = $this->shortenUrlRepositoryInterface->deleteUrl($request->url_id);
            Alert::success($message, true);
            return redirect()->route('shortenUrls.getUrls');
        } catch (\Exception $e) {
            return $this->error("Something went wrong with error ".$e, null, $e->getCode());
        }
    }
}
