<?php

namespace App\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    /** @use HasFactory<TeamFactory> */
    use HasFactory;

    protected $guarded = false;

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function invites(): HasMany
    {
        return $this->hasMany(TeamInvite::class);
    }

}
