<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function __construct(array $attributes = [])
    {
        $this->setup();

        parent::__construct($attributes);
    }

    public function user()
    {
    	return $this->BelongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected function setup()
    {
        $this->setTable('posts');

        $this->fillable([
            'user_id',
            'title',
            'body',
        ]);
    }

    public function path()
    {
        return "/posts/" . $this->id;
    }
}
