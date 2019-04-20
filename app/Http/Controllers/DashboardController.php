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
        $invitations = $user->invitations()->get();

        return view('dashboard', compact('user', 'invitations'));
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
        $invitationResponse = $request->input('invitation_response');
        $isGoing = false;
        if ($invitationResponse == "Jom") {
            $isGoing = true;
        }
        $invitation->is_going = $isGoing;
        $invitation->response_at = Carbon::now();
        $invitation->save();

        return redirect()->route('dashboard.invitation.index', $request->input('token'));
    }
}
