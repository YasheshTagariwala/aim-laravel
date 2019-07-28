<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ProjectStatus extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'project_status';

    public function __construct() {
        if(!Schema::hasTable('project_status')) {
            Schema::create('project_status',function (Blueprint $table) {
                $table->increments('id');
                $table->integer('project_id');
                $table->string('title');
                $table->text('description');
                $table->integer('progress');
                $table->integer('created_by');
                $table->integer('updated_by');
                $table->timestamps();
                $table->integer('delete_status')->default(0);
            });
        }
    }
}
