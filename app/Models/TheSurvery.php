<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TheSurvery extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    public function organization():BelongsTo{
        return $this->BelongsTo(organization::class);
    }
    public function rating():BelongsTo{
        return $this->BelongsTo(Rating::class);
    }
    
}
