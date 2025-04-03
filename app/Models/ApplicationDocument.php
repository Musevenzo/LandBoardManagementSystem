<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory

class ApplicationDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id', 'path', 'original_name', 'mime_type'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
