<?php

namespace App\Models;

use App\Http\Controllers\CountryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function countries()
    {
        return $this->hasMany(CountryController::class);
    }
}
