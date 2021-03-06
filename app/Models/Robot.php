<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'robots';

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
                  'user_id',
                  'state'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the User for this model.
     *
     * @return App\Models\User
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comment for this model.
     *
     * @return App\Models\Comment
     */
    public function comments()
    {

        return $this->hasMany(Comment::class)->whereNull('comment_id');
    }

    /**
     * Get the report for this model.
     *
     * @return App\Models\Report
     */
    public function reports()
    {
        return $this->hasMany('App\Models\Report','robot_id','id');
    }

    /**
     * Get the robotInfo for this model.
     *
     * @return App\Models\RobotInfo
     */
    public function robotInfos()
    {
        return $this->hasMany('App\Models\RobotInfo','robot_id','id');
    }

    /**
     * Get the savedList for this model.
     *
     * @return App\Models\SavedList
     */
    public function savedList()
    {
        return $this->hasMany('App\Models\SavedList','robot_id','id');
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
