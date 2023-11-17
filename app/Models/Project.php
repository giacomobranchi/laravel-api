<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class project extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'cover_image', 'content', 'github', 'website', 'type_id'];

    // CHECK IF ALREADY EXISTS WHEN ADDING ENTRIES
    public function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function Type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function Technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
}
