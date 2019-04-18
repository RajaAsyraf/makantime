<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $token = 'acaphaha';
        return $this->getInvitation($token);
    }

    /**
     * Show the dashboard with user invitation.
     *
     * @param string $token
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getInvitation($token)
    {
        $invitation = Invitation::where('token', $token)->with('user', 'group')->first();   
        return view('dashboard', compact('invitation'));
    }
}
