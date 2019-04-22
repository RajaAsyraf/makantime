<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use App\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = 1;
        return $this->getInvitation($userId);
    }

    /**
     * Show the dashboard with user invitation.
     *
     * @param string $token
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getInvitation(User $user)
    {
        $invitationResponses = $user->invitationReponses()->with('invitation')->get();

        return view('dashboard', compact('user', 'invitationResponses'));
    }
    
    /**
     * Set invitation response
     * 
     * @param Request $request
     * @param string $token
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setInvitation(Request $request, Invitation $invitation)
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

        return redirect()->route('dashboard.invitation.index', $userId);
    }
}
