<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model {

    use HasFactory;

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_type_name',
        'status',
        'description'
    ];
    
    public function termsCondition()
    {
        return $this->hasMany('App\Models\TermsCondition');
    }

}
