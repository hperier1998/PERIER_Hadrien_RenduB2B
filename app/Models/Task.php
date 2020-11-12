<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    /**
     * Get the category that owns the task.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The users that belong to the task.
     */
    public function assignedUsers()
    {
        return $this->belongsToMany(User::class)->using(TaskUser::class);
    }

    /**
     * The participants that belongs to the board in which task belongs
     */
    public function participants()
    {
        return $this->hasManyThrough(User::class, BoardUser::class, 'board_id', 'id', 'board_id', 'board_id');
    }

    /**
     * Get the comments for the task.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the attachments for the task.
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    /**
     * Get the board that owns the task.
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
