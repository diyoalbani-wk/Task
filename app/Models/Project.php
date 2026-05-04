<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Task;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}