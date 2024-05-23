<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',  
        'description',
        'status_id'
    ];
    protected $dates = [
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
