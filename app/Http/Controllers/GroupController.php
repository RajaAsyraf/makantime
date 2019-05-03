<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // validate request input
        $validatedData = $request->validate([
            'name' => 'required|unique:groups|max:50',
        ]);

        DB::transaction(function () use ($validatedData) {
            $group = Group::create([
                'name' => $validatedData['name'],
                'created_by' => Auth::user()->id,
            ]);
            $groupUser = GroupUser::create([
                'group_id' => $group->id,
                'user_id' => Auth::user()->id,
                'is_admin' => true
            ]);
        });
        // TODO: send response with notification for the request status

        return redirect()->route('group.index');
    }
}
