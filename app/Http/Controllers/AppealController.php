<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Http\Request;

class AppealController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('get')) {
            //echo('HELLO');
            $appeal = new Appeal;
            return view('appeal', ['appeal' => $appeal]);
        }

        if ($request->isMethod('post')) {
            echo('NICE!');
            $validation = $request->validate([
                'name' => 'required'
            ]);
            return view('appeal');
        }
    }
}
