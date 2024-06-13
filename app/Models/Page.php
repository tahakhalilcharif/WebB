<?php

namespace App\Models;

use App\Models\Website;
use App\Models\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['website_id', 'title', 'content'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function components()
    {
        return $this->hasMany(Component::class);
    }
}