<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class folders extends Model
{
    use HasFactory;

    protected $fillable = [
        'foldername',
        'created',
        'edited',
        'folder_id',
        'parent_folder'
    ];
}
