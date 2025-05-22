<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'seo';

    protected $fillable = [
        'model_type',
        'model_id',
        'title',
        'description',
        'keywords',
        'canonical_url',
        'image',
        'author',
        'robots',
        'webmaster_tags',
        'opengraph',
        'twitter',
        'json_ld',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'keywords' => 'array',
        'webmaster_tags' => 'array',
        'opengraph' => 'array',
        'twitter' => 'array',
        'json_ld' => 'array',
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
