<?php

namespace App\Models;

use App\Models\Owner\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityStore extends Model
{
    use HasFactory;

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id')->withTrashed();
    }
}
