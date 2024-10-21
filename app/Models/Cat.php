<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cat extends Model
{
    use HasFactory;

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
