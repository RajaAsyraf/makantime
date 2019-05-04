<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    /**
     * Show the dashboard with user invitation.
     *
     * @param User $user
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $invitationResponses = Auth::user()->invitationReponses()->with('invitation')->get();
        return view('invitation.index', compact('user', 'invitationResponses'));
    }

    /**
     * Set invitation response
     * 
     * @param Request $request
     * @param Invitation $invitation
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeResponse(Request $request, Invitation $invitation)
    {
        $invitationAnswer = $request->input('invitation_answer');
        $userId = $request->input('user_id');
        $isGoing = false;
        if ($invitationAnswer == "Jom") {
            $isGoing = true;
        }
        
        $invitationResponse = $invitation->usersInvited()->where('user_id', $userId)->first();
        $invitationResponse->is_going = $isGoing;
        $invitationResponse->response_at = Carbon::now();
        $invitationResponse->save();

        return redirect()->route('invitation.show');
    }

    /**
     * Show the invitation creating page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $user = Auth::user();
        $groups = $user->groupUsers()->where([
            ['user_id', $user->id],
            ['is_admin', true]
        ])->get()->pluck('group')->unique();
        
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
