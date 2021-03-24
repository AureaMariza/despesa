<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'data',
        'anexo',
        'user_id',
        'valor'
    ];

    protected $casts = [
        'data' => 'datetime',
    ];

    /**
     * Get user
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
