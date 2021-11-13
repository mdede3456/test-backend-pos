<?php

namespace App\Models\Owner;

use App\Models\ActivityStore;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id')->withTrashed();
    }

    public function aktivitas()
    {
        return $this->hasMany(ActivityStore::class,'store_id')->orderBy("id","desc");
    }

    public function cabang()
    {
        return $this->hasMany(Cabang::class,'store_id');
    }
}
