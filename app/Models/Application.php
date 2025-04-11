<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'omang_number',
        'ward',
        'village',
        'address',
        'marital_status',
        'date_of_birth',
        'location',
        'spouse_full_name',
        'spouse_omang_number',
        'age_declaration',
        'plot_ownership',
        'never_owned_plot',
        'spouse_plot_ownership',
        'spouse_never_owned_plot',
        'omang_copy',
        'proof_of_payment',
        'additional_documents',
        'terms_agreement',
        'user_id', 
        'plot_id', 
        'purpose', 
        'status', 
        'comments'
    ];

    protected $casts = [
        'age_declaration' => 'boolean',
        'plot_ownership' => 'boolean',
        'never_owned_plot' => 'boolean',
        'spouse_plot_ownership' => 'boolean',
        'spouse_never_owned_plot' => 'boolean',
        'terms_agreement' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }

    public function documents()
    {
        return $this->hasMany(ApplicationDocument::class);
    }

     public function applications()
     {
         return $this->hasMany(Application::class);
     }
}