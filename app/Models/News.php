<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'text',
        'is_published',
        'published_at'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function save(array $options = [])
    {
        if ($this->exists && $this->isDirty('slug')) {
            $oldSlug = route('news_item', ['slug' => $this->getOriginal('slug')], false);
            $newSlug = route('news_item', ['slug' => $this->slug], false);

            $redirect = new Redirect();
            $redirect->old_slug = $oldSlug;
            $redirect->new_slug = $newSlug;
            $redirect->save();
        }
        return parent::save($options);
    }
}
