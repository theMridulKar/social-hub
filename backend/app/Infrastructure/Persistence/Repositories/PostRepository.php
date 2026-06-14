<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\Post as DomainPost;
use App\Domain\Repositories\PostRepositoryInterface;
use App\Infrastructure\Persistence\Models\Post as PostModel;

class PostRepository implements PostRepositoryInterface
{
    public function create(array $data): DomainPost
    {
        $post = PostModel::create($data);

        return $this->toDomain($post);
    }

    public function findById(int $id): ?DomainPost
    {
        $post = PostModel::find($id);
        return $post ? $this->toDomain($post) : null;
    }

    public function getAll(): array
    {
        return PostModel::query()->latest()->get()
            ->map(fn (PostModel $post) => $this->toDomain($post))
            ->all();
    }

    public function delete(int $id): void
    {
        PostModel::destroy($id);
    }

    private function toDomain(PostModel $post): DomainPost {

        return new DomainPost(
            id: $post->id,
            userId: $post->user_id,
            content: $post->content,
            image: $post->image,
        );
    }
}