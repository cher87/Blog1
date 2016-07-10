<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function __construct(array $attributes = [])
    {
        $this->setup();

        parent::__construct($attributes);
    }

    public function posts()
    {
    	return $this->BelongsTo(Post::class);
    }

    protected function setup()
    {
        $this->setTable('comments');

        $this->fillable([ 'user_id', 'post_id', 'body' ]);
    }
}
