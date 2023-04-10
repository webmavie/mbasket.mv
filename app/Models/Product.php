<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
    ];

    protected $appends = [
        'images'
    ];

    public function getImagesAttribute(): array
    {
        $images = [];
        foreach ($this->getMedia('images') as $image) {
            $images[] = $image->getUrl();
        }
        return $images;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
