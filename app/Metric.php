<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    protected $fillable = ['commit', 'files', 'loc', 'ncloc', 'classes', 'methods', 'coveredmethods', 'conditionals',
        'coveredconditionals', 'statements', 'coveredstatements', 'elements', 'coveredelements'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
