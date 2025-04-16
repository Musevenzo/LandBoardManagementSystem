<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
        'plot_number',
        'location',
        'size',
        'status',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}