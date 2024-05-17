<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'name',
    ];

    /**
     * Get the logs for the user.
     */
    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
