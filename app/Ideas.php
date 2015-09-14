<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ideas extends Model
{
    protected $fillable = [
        'ideaname',
        'idea',
        'users_id' //temporary
    ];
    public function setDateCreated($date)
    {
        $this->attributes['dateuploaded']=$date;
    }

    /**
     * An article is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Users');
    }

    /**
     * Get the tags associated with the given idea.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with the current article
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }
}
