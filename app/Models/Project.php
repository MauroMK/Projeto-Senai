<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $dates = ['start_date', 'end_date'];
    protected $fillable = [
        "name",
        "status",
        "observation",
        "user_id",
        "start_date",
        "end_date"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
