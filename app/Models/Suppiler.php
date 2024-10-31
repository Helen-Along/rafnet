<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suppiler extends Model
{
    use HasFactory;

    public function supplier(): BelongsTo  {
        return $this->belongsTo(User::class);
    }
}
