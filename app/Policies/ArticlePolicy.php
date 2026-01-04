<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article): Response
    {
        return $user->id === $article->user_id || $user->organization_id === $article->user_id
            ? Response::allow()
            : Response::deny('You do not own this article.');
    }
}
