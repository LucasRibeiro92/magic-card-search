<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mtgsdk\Card;
use mtgsdk\Set;

class ControllerCards extends Controller
{
    
    protected static $imageDefault = "https://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=141653&type=card";

    public function index()
    {
        $sets = Set::all();
        $randomSet = array_rand($sets, 1);
        $set = $sets[$randomSet]->code;

        /**
         * @var Card $cards
         */
        $cards = Card::where(['set' => $set])->where(['page' => 1, 'pageSize' => 12])->all();

        return view('cards.index')
            ->with('cards', $cards)
            ->with('imageDefault', ControllerCards::$imageDefault);
    }

    public function search(Request $request)
    {
        $searchContent = $request->searchContent;

        /**
         * @var Card $cards
         */
        $cards = Card::where(['page' => 1, 'pageSize' => 50])->where(['name' => $searchContent])->all();

        return view('cards.searched')
            ->with('cards', $cards)
            ->with('imageDefault', ControllerCards::$imageDefault);

    }
}
