<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist_name',
        'listen_link',
        'cover_image',
        'week_id',
        'user_id',
    ];

    public function setListenLinkAttribute($value)
    {
        $this->attributes['listen_link'] = $value;

        $coverImage = $this->fetchCoverImageFromLink($value);
        $this->attributes['cover_image'] = $coverImage;
    }

    protected function fetchCoverImageFromLink(string $link): ?string
    {
        try {
            $response = Http::get('https://api.example.com/get-cover', ['url' => $link]);

            if ($response->successful()) {
                return $response->json()['cover_image_url'];
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }
}
