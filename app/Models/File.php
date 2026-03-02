<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'file_path',
        'file_size'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
