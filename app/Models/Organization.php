<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function user():BelongsTo{
        return $this->BelongsTo(User::class);
    }

    public function survey():HasMany{
        return $this->hasMany(TheSurvery::class);
    }
    
}
