<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    /**
     * Show the dashboard with user invitation.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $invitations = Auth::user()->invitations()->get();
        return view('invitation.index', compact('invitations'));
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
        $validatedData = $request->validate([
            'invitation_answer' => 'required'
        ]);
        $isGoing = false;
        if ($validatedData['invitation_answer'] == "Jom") {
            $isGoing = true;
        }
        $invitation->users()->updateExistingPivot(Auth::user(), [
            'is_going' => $isGoing,
            'response_at' => Carbon::now()
        ]);
        return redirect()->route('invitation.show');
    }

    /**
     * Show the invitation creating page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $groups = Auth::user()->groups()->with('restaurants')->get();
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
        $validatedData = $request->validate([
            'group_id' => 'required|integer',
            'restaurant_id' => 'required|integer',
            'time' => 'required',
            'date' => 'required',
        ]);

        $group = Auth::user()->groups()->where('group_id', $validatedData['group_id'])->first();
        $groupMembers = $group->users()->get();
        $restaurant = $group->restaurants()->where('restaurant_id', $validatedData['restaurant_id'])->first();
        $appointment_date = date('Y-m-d H:i:s', strtotime($validatedData['date'].$validatedData['time'].':00'));
        
        $invitation = DB::transaction(function () use ($group, $groupMembers, $restaurant, $appointment_date) {
            $invitation = Invitation::create([
                'group_id' => $group->id,
                'restaurant_id' => $restaurant->id,
                'appointment_at' => $appointment_date,
            ]);
            foreach ($groupMembers as $member) {
                $invitation->users()->attach($member);
            }
            return $invitation;
        });

        // TODO: return errors
        // TODO: return notification
        return json_encode($invitation);
    }
}
