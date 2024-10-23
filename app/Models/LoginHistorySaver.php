<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//Dit is om login geschiedenis op te slaan, dit kan ik later gebruiken voor diepere validatie. (checken of een gebruiker X aantal keer is ingelogd)
class LoginHistorySaver extends Model
{
    use HasFactory;

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
