<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EwsRecord extends Model
{
    protected $table = 'ews_records';
    protected $fillable = [
        'name', 
        'medic_number',
        'room',
        'score_1',
        'score_2',
        'score_3',
        'score_4',
        'score_5',
        'score_6',
        'score_total',
        'category',
        'user_id',
        'note',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
