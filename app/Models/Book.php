<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Book extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }
    public function scopePopular(Builder $query, $from =null, $to=null): Builder|QueryBuilder
    {
        return $query->withCount([
            'reviews' => fn (Builder $query) => $this->dataRangeFileter($query, $from, $to)
        ])
        ->orderBy('reviews_count', 'desc');
    }

    public function scopeHighestRated(Builder $query, $from =null, $to=null): Builder|QueryBuilder
    {
        return $query->withAvg([
            'reviews' => fn (Builder $query) => $this->dataRangeFileter($query, $from, $to)
        ],'rating')
            ->orderBy('reviews_avg_rating', 'desc');
    }

    public function scopeMinReviews(Builder $query, int $miniReviews): Builder|QueryBuilder
    {
        return $query->having('reviews_count', '>=', $miniReviews);
    }

    private function dataRangeFileter(Builder $query, $from = null, $to = null)
    {
        if ($from && !$to) {
            return $query->where('created_at', '>=', $from);
        } elseif (!$from && $to) {
            return $query->where('created_at', '<=', $to);
        } elseif ($from && $to) {
            return $query->whereBetween('created_at', [$from, $to]);
        }
    }
}
