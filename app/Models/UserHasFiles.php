<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class UserHasFiles extends Model
{
    use HasFactory;
    use HasCompositeKey;

    protected $table = 'USER_has_FILES_JT';
    protected $primaryKey = ['USER_ID', 'FILE_ID'];

    protected $fillable = [
        'USER_ID', 'FILE_ID'
    ];
}
