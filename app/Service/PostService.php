<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $preparedData = $this->dataPreparation($data);
            $post = Post::query()->firstOrCreate($preparedData ['data']);
            if (isset($preparedData['tagIds'])) {
                $post->tags()->attach($preparedData ['tagIds']);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
            $preparedData = $this->dataPreparation($data);
            $post->update($preparedData['data']);
            if (isset($preparedData['tagIds'])) {
                $post->tags()->sync($preparedData['tagIds']);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }

    public function dataPreparation($data)
    {
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }
        if (isset($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            return [
                'data' => $data,
                'tagIds' => $tagIds,
            ];
        }
        return [
            'data' => $data,
        ];
    }
}
