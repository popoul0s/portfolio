<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Etude extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'current',
        'started_at',
        'finished_at',
        'user_id',
    ];

    public function experiences(): HasMany
    {
        return $this->hasMany(Exeperience::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
