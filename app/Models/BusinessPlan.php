<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessPlan extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ent_businessplan';

    public function user() {
        return $this->hasOne(UserDetails::class,'id','created_by');
    }

    public function feedbacks() {
        return $this->hasMany(BusinessPlanFeedback::class,'business_plan_id','id');
    }

}
