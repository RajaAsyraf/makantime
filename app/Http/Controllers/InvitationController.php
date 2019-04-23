<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    /**
     * Show the invitation creating page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $groups = Auth::user()->groups()->get();
        
        return view('invitation.create', compact('groups'));
    }

    /**
     * Store invitation details
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $input = $request->input();
        dd($input);
    }
}
