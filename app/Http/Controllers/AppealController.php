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
            $success = '';
            return view('appeal');
        }

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|min:2|max:20',
                'phone' => 'required_without:email|nullable|size:11',
                'email' => 'required_without:phone|nullable|regex:/^.+@.+$/i|max:100',
                'message' => 'required|max:100'
            ]);

            $appeal = new Appeal();
            $appeal->name = $request->input('name');
            $appeal->phone = $request->input('phone');
            $appeal->email = $request->input('email');
            $appeal->message = $request->input('message');

            $appeal->save();

            return redirect()->back()->with('message', 'Сообщение успешно отправлено и зарегистрировано');

        }
    }
}
