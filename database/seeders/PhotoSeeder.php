<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Photo::create([
            'name' => 'First Photo',
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => 1,
            'is_published' => true,
        ])
            ->addMedia(public_path('seeds/photos/photo1.avif'))
            ->preservingOriginal()
            ->toMediaCollection();

        Photo::create([
            'name' => 'Second Photo',
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => 1,
            'is_published' => true,
        ])
            ->addMedia(public_path('seeds/photos/photo2.avif'))
            ->preservingOriginal()
            ->toMediaCollection();

        Photo::create([
            'name' => 'Third Photo',
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => 1,
            'is_published' => true,
        ])
            ->addMedia(public_path('seeds/photos/photo3.avif'))
            ->preservingOriginal()
            ->toMediaCollection();
    }
}
