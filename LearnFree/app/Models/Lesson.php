<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    //мягкое удаление
    use SoftDeletes;
   /**
   * Атрибуты, для которых разрешено массовое назначение.
   *
   * @var array
   */
    protected $fillable = [
        'title', 'description', 'video_link', 'course_id'
    ];
    
   /**
   * Атрибуты, которые должны быть преобразованы в даты.
   *
   * @var array
   */
    protected  $dates = ['deleted_at'];
    
    //Связь многие к одному
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
