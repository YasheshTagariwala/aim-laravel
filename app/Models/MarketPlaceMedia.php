<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MarketPlaceMedia extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marketplace_media';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['marketplace_id', 'media_type', 'media_title', 'media_content'];

    public function getMedia(){
        $sType = $this->media_type;
        switch ($sType){
            case 'videos':
                return $this->media_content;
                break;
            default :
                if(Storage::exists($this->media_content)){
                    return Storage::url($this->media_content);
                }
                return '';
                break;

        }

    }

}
