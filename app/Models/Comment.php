<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'robot_id',
                  'user_id',
                  'comment_id',
                  'comment'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the Robot for this model.
     *
     * @return App\Models\Robot
     */

    public function robot()
    {
        return $this->belongsTo(Robot::class);
    }

    /**
     * Get the User for this model.
     *
     * @return App\Models\User
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function robotInfos()
    {
        return $this->belongsTo(RobotInfo::class);
    }
    
    /**
     * Get the ParentComment for this model.
     *
     * @return App\Models\Comment
     */

    public function replies(){
        return $this->hasMany(Comment::class,'comment_id');
    }
    public function ParentComment()
    {
        return $this->belongsTo('App\Models\Comment','comment_id','id');
    }

    /**
     * Get the childComment for this model.
     *
     * @return App\Models\Comment
     */
    public function childComment()
    {
        return $this->hasOne('App\Models\Comment','comment_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
