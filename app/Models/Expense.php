<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
class Expense extends Model
{
    protected $fillable = [
        'title',
        'amount',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
