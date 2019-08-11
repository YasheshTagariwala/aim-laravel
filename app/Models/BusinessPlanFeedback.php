<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class BusinessPlanFeedback extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'business_plan_feedback';

    public function __construct() {
        if(!Schema::hasTable('business_plan_feedback')) {
            Schema::create('business_plan_feedback',function (Blueprint $table) {
                $table->increments('id');
                $table->integer('business_plan_id');
                $table->text('feedback');
                $table->integer('userid');
                $table->timestamps();
                $table->integer('delete_status')->default(0);
            });
        }
    }

    public function entrepreneurs() {
        return $this->hasOne(Entrepreneurs::class,'created_by','created_by');
    }

    public function user() {
        return $this->hasOne(UserDetails::class,'id','userid');
    }

    public function businessPlan() {
        return $this->hasOne(BusinessPlan::class,'id','business_plan_id');
    }
}
