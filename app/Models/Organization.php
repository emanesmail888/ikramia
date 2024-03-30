<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Organization extends Model
{
    use HasFactory;
    protected $fillable = ['organization_name','address', 'city','phone','user_id'];
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
