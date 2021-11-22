<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    use HasFactory;
    
    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;
    
    protected $primaryKey = 'id';
    protected $table  = 'terms_conditions';

    public function userType(){
        return $this->belongsTo('App\Models\UserType', 'user_type_id', 'id' );
    }

    public function sectionType(){
        return $this->belongsTo('App\Models\SectionType', 'sec_type_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_type_id',
        'sec_type_id',
        'description'
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
