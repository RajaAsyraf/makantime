<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupUser;
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
        return view('group.create');
    }

    /**
     * Store group creation
     * 
     * @return view
     */
    public function store(Request $request)
    {
        // TODO: add validation to only receive unique group name
        // TODO: enable to rollback db if any error
        $input = $request->input();
        $group = Group::create([
            'name' => $input['name'],
            'created_by' => Auth::user()->id,
        ]);
        $groupUser = GroupUser::create([
            'group_id' => $group->id,
            'user_id' => Auth::user()->id,
            'is_admin' => true
        ]);
        // TODO: response with notification for the request status

        return redirect()->route('group.index');
    }
}
