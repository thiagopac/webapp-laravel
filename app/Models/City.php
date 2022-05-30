<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user_infos()
    {
        return $this->hasMany(UserInfo::class);
    }
}
