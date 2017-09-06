<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model 
{
    //мягкое удаление
    use SoftDeletes;
    
    /**
   * Атрибуты, для которых разрешено массовое назначение.
   *
   * @var array
   */
    protected $fillable = [
        'title', 'short_description', 'description', 
        'image_url', 'video_url', 'user_id'
    ];
    
    /**
    * Атрибуты, которые должны быть преобразованы в даты.
    *
    * @var array
    */
     protected  $dates = ['deleted_at'];
     
     //Связи между моделями
     
     //Связь один ко многим
     public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
    
    //Связь многие к одному
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
