<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BoardUser extends Pivot
{
    use HasFactory;

    protected $table = "board_user";

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the board.
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    /**
     * Get the tasks.
     */
    public function tasks()
    {
        return $this->hasManyThrough(Task::class, Board::class, 'id', 'board_id', 'board_id', 'id');
    }
}
