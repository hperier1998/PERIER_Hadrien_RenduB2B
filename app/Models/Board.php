<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $with = ['owner'];

    /**
     * The users that belong to the board.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->using(BoardUser::class);
    }
    /**
     * Get the user that owns the board.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the tasks for the board.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
