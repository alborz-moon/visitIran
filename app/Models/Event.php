<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    
    protected $fillable = [
        'title',
        'start_registry',
        'end_registry',
        'img',
        'price',
        'facilities',
        'seo_tags',
        'ticket_description',
        'age_description',
        'level_description',
        'status',
        'capacity',
        'address',
        'email',
        'site',
        'phone',
        'x',
        'y',
        'city_id',
        'launcher_id',
        'description',
        'is_in_top_list',
        'visibility',
        'off',
        'off_type',
        'off_expiration',
        'priority',
        'digest',
        'keywords',
        'tags',
        'alt',
        'slug',
        'link',
        'language'
    ];

    public function city() {
        return $this->belongsTo(City::class);
    }
    
    public function launcher() {
        return $this->belongsTo(Launcher::class);
    }

    public function sessions() {
        return $this->hasMany(EventSession::class);
    }

    public function galleries() {
        return $this->hasMany(EventGallery::class);
    }

    public function scopeActiveForRegistry($query) {
        $now = (int)Controller::getToday()['date'];
        return $query->where('visibility', true)
            ->where('status', true)
            ->where('start_registry', '<=', $now)
            ->where('end_registry', '>=', $now);
    }
    
    public function scopeTop($query) {
        return $query->where('is_in_top_list', true);
    }
    
    public function activeOff() {

        if($this->off != null) {
            $today = (int)Controller::getToday()['date'];
            if((int)$this->off_expiration >= $today)
                return [
                    'type' => $this->off_type,
                    'value' => $this->off
                ];
        }

    }
}
