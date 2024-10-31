<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServicesOrder extends Model
{
    use HasFactory;

    public function order() : BelongsTo {
        return $this->belongsTo(Services::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
