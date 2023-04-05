<?php

namespace App\Http\Controllers;
use App\Services\ShowProfileService;
use Illuminate\Http\Request;
use App\Models\Item;
class IndexController extends Controller
{
    private $service;
    public function __construct(ShowProfileService $showProfileService)
    {
        $this->service = $showProfileService;
    }
    public function showProfile(){
        return $this->service->showProfile();
    }
    public function Search($keyword){
        return $this->service->Search($keyword);  
    }
    public function SearchBackIndex(){
        return $this->service->SearchBackIndex();  
    }
    public function newitems(){
        return $this->service->newitems();  
    }
    public function Iphone14(){
        return $this->service->Iphone14();  
    }
}
