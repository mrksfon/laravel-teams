<?php

namespace App\Models;

use Database\Factories\TeamInviteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamInvite extends Model
{
    /** @use HasFactory<TeamInviteFactory> */
    use HasFactory;

    protected $guarded = false;
}
