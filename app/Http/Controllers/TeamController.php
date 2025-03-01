<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetCurrentTeamRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeamController extends Controller
{

    public function setCurrent(SetCurrentTeamRequest $request, Team $team)
    {
        $request->user()->currentTeam()->associate($team)->save();

        return back();
    }

    public function edit(Request $request)
    {
        return view('team.edit', [
            'team' => $request->user()->currentTeam,
        ]);
    }

    public function update(TeamUpdateRequest $request, Team $team)
    {
        $team->update($request->only('name'));

        return back();
    }
}
