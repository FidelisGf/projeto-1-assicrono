<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'data_hora',
    ];

    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id');
    }
}
