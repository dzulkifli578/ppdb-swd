<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = "registrations";

    protected $fillable = [
        "nisn",
        "birth_place",
        "birth_date",
        "program_id",
        "document_path",
        "status"
    ];
}
