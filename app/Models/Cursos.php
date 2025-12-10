<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Cursos extends Model
{
    //

    protected $table = 'cursos';
    protected $fillable = ['title', 'slug', 'text', 'gallery', 'order'];

    protected $casts = [
        'gallery' => 'array',
    ];

    protected static function booted(){
        static::saving(function ($item) {
            $item->slug = Str::slug($item->title);
            $item->order = Cursos::max('order') + 1;
        });

        static::deleting(function ($item) {
            if ($item->gallery) {
                foreach ($item->gallery as $imagem) {
                    $data = $imagem['data'] ?? null;

                    if (is_array($data)) {
                        foreach ($data as $path) {
                            Storage::disk('public')->delete($path);
                        }
                    }
                }
            }
        });
    }
}
