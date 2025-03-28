<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamInviteStoreRequest;
use App\Models\Team;

class TeamInviteController extends Controller
{
    public function store(TeamInviteStoreRequest $request, Team $team)
    {
        $invite = $team->invites()->create([
            'email' => $request->email,
            'token' => str()->random(30),
        ]);

        return back()->withStatus('team-invited');
    }

}
