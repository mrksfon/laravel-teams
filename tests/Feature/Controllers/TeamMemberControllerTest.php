<?php

use App\Http\Middleware\TeamPermission;
use App\Models\Team;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('can remove a member from a team', function () {
    $user = User::factory()->create();

    $user->currentTeam->members()->attach($member = User::factory()->create());

    $member->currentTeam()->associate($user->currentTeam)->save();

    actingAs($user)
        ->delete(route('team.members.destroy', [$user->currentTeam, $member]))
        ->assertRedirect();

    expect($user->fresh()->currentTeam->members->contains($member))->toBeFalse()
        ->and($member->fresh()->current_team_id)->not->toEqual($user->current_team_id);
});

it('can not remove a member from the team without permission', closure: function () {
    $user = User::factory()->create();

    $anotherUser = User::factory()->create();

    $user->currentTeam->members()->attach($member = User::factory()->create());

    setPermissionsTeamId($user->currentTeam->id);

    actingAs($anotherUser)
        ->withoutMiddleware(middleware: TeamPermission::class)
        ->delete(route('team.members.destroy', [$user->currentTeam, $member]))
        ->assertForbidden();
});


it('can not remove self from the team', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->delete(route('team.members.destroy', [$user->currentTeam, $user]))
        ->assertForbidden();
});
