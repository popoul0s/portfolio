<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'current',
        'started_at',
        'finished_at',
        'sort',
        'etude_id',
        'company_id',
        'profile_id',
        'competences',
        'user_id',
        'title',
    ];
    
    public function etude(): BelongsTo
    {
        return $this->belongsTo(Etude::class);
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'competences' => 'array',
    ];
}
