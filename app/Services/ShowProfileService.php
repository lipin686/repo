<?php

namespace App\Services;

use App\Models\Item;
use Mockery\Undefined;

/**
 * Class InspiringService
 */
class ShowProfileService
{
    /**
     * @return string
     */
    public function showProfile()
    {
        $items = Item::all();
        return view('index', compact('items'));
    }
    public function Search($keyword)
    {
        $items = Item::Where('title', 'like', "%" . $keyword . "%")->get();
        
        return view('search', compact('items'));
    }
    public function SearchBackIndex()
    {
        return redirect()->route('indexpage');
    }
    
    public function newitems()
    {  
        $BeginDate=date('Y-m-01', strtotime(date("Y-m-d")));
        $items = Item::where('created_at', '>', $BeginDate)->get();
        return view('newitems', compact('items'));
    }
    public function Iphone14()
    {
        $items = Item::Where('title', 'like', "Iphone%")->get();
        return view('Iphone14', compact('items'));
    }
}
