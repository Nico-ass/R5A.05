<?php

namespace Database\Factories;

use App\Models\Track;

use App\Models\User;
use App\Models\Week;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
{
    protected $model = Track::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'artist_name' => $this->faker->name,
            'listen_link' => $this->faker->url,
            'cover_image' => $this->faker->imageUrl(640, 480, 'music'),
            //'week_id' => Week::factory(),
            //'user_id' => User::factory(),
        ];
    }

}
