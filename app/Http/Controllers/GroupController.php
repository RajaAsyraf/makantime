<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display group listing page
     * 
     * @return view
     */
    public function index()
    {
        $groupUsers = Auth::user()->groupUsers()->get();
        
        return view('group.index', compact('groupUsers'));
    }

    /**
     * Display group creation page
     * 
     * @return view
     */
    public function create()
    {
        return 'nice';
    }
}
