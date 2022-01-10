<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pmb extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, "prodi_id", "id");
    }
}
