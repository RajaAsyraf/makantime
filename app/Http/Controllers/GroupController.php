<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\GroupUser;
use App\Restaurant;
use Illuminate\Http\Request;
use App\GroupMemberInvitation;
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

    /**
     * Display selected group page
     * 
     * @param Group $group
     * 
     * @return view
     */
    public function show(Group $group)
    {
        $isGroupAdmin = false;
        $groupAdmins = $group->getAdmins()->get();
        foreach ($groupAdmins as $groupAdmin) {
            if ($groupAdmin->user_id == Auth::user()->id) {
                $isGroupAdmin = true;
            }
        }
        return view('group.show', compact('group', 'isGroupAdmin'));
    }

    /**
     * Display selected group to add member page
     * 
     * @param Group $group
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function invite(Group $group)
    {
        return view('group.invite', compact('group'));
    }

    /**
     * Store group invitation to add member. Email will be sent to member invited.
     * 
     * @param Request $request
     * @param Group $group
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeInvitation(Request $request, Group $group)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:255|email',
        ]);
        $email = $validatedData['email'];
        
        $existingUser = User::where('email', $email)->first();
        
        if ($existingUser) {
            $exitingMember = $group->groupUsers()->where('user_id', $existingUser->id)->first();
            if ($exitingMember) {
                // TODO: return withErrors
                return back()->withInput();
            }
            $userId = $existingUser->id;
            $email = NULL;
        } else {
            $userId = NULL;
        }

        $groupInvitation = GroupMemberInvitation::create([
            'group_id' => $group->id,
            'user_id' => $userId,
            'email' => $email,
            'created_by' => Auth::user()->id
        ]);

        // TODO: return with notification
        return back();
    }

    /**
     * Display suggest new restaurant for group page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createGroupRestaurant(Group $group)
    {
        return view('group.createRestaurant', compact('group'));
    }

    /**
     * Store suggested new restaurant for group
     * 
     * @param Request $request
     * @param Group $group
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeGroupRestaurant(Request $request, Group $group)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        DB::transaction(function () use ($validatedData, $group) {
            $restaurant = Restaurant::create([
                'name' => $validatedData['name'],
                'created_by' => Auth::id()
            ]);
            $group->restaurants()->attach($restaurant);
        });
        return redirect()->route('group.show', ['group' => $group->id]);
    }
}
