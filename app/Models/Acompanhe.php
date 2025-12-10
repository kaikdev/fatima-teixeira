<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Acompanhe extends Model
{
    protected $table = 'acompanhe';
    protected $fillable = ['title', 'slug', 'author', 'resume', 'gallery', 'text', 'scheduled_at', 'order', 'status'];

    protected $casts = [
        'gallery' => 'array',
        'scheduled_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::saving(function ($item) {
            $item->slug = Str::slug($item->title);
            $item->order = Acompanhe::max('order') + 1;
        });

        static::updating(function ($item){
            if ($item->isDirty('gallery')) {
                $originalGallery = $item->getOriginal('gallery');
                if ($originalGallery) {
                    foreach ($originalGallery as $imagem) {
                        $data = $imagem['data'] ?? null;

                        if (is_array($data)) {
                            foreach ($data as $path) {
                                if (!in_array($path, $item->gallery ? array_column($item->gallery, 'data') : [])) {
                                    Storage::disk('public')->delete($path);
                                }
                            }
                        }
                    }
                }
            }
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

    public static function checkStatusUpdate()
    {
        $currentDateTime = Carbon::now('America/Sao_Paulo');

        Acompanhe::where('status', 'schedule')
            ->where('scheduled_at', '<=', $currentDateTime)
            ->update(['status' => 'now', 'scheduled_at' => null]);
    }
}
