<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    //уведомления
    use Notifiable;
    //мягкое удаление
    use SoftDeletes;

   /**
   * Атрибуты, для которых разрешено массовое назначение.
   *
   * @var array
   */
    protected $fillable = [
        'nickname', 'email', 'password', 'name', 'surname', 'date_of_birth',
        'gender_id', 'country_id', 'region_id', 'city_id', 'show_name_id', 'about_me'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
   /**
   * Атрибуты, для которых запрещено массовое назначение.
   *
   * @var array
   */
        
   /**
   * Атрибуты, которые должны быть преобразованы в даты.
   *
   * @var array
   */
    protected  $dates = [
        'deleted_at', 'date_of_birth'
        ];
    
    //Связь один ко многим
    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
    
}
