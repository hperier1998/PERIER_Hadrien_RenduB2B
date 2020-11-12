<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the comments commented by the User.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The boards that belong to the user.
     */
    public function boards()
    {
        return $this->belongsToMany(Board::class)->using(BoardUser::class);
    }

    /**
     * Get the boards own by the user
     */
    public function ownedBoards()
    {
        return $this->hasMany(Board::class);
    }

    public function assignedTasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function allTasks()
    {
        return $this->hasManyThrough(Task::class, Board::class);
    }

    /**
     * The tasks that belong to the user.
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class)->using(TaskUser::class);
    }

    /**
     * Get the attachments own by the user.
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

}
