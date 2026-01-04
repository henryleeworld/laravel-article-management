<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['title', 'full_text', 'category_id', 'user_id', 'published_at'];

    /**
     * Get the user that owns the article.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        if (auth()->check() && !auth()->user()->is_admin) {
            static::addGlobalScope('user', function (Builder $builder) {
                $organizationId = auth()->user()->organization_id ? auth()->user()->organization_id : auth()->id();
                $builder->where('user_id', $organizationId);
            });
        }
    }
}
