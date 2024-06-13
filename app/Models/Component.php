<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Component extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'type', 'content'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}