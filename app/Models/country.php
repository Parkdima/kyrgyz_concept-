<?php

namespace App\Models;

use App\Http\Controllers\StateController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(StateController::class);
    }
}
