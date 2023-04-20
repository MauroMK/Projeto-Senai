<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Task extends Model
{
    use HasFactory;
    protected $table = "tasks";
    protected $dates = ['start_date', 'end_date'];
    protected $fillable = [
        "name",
        "project_id",
        "status",
        "observation",
        "user_id",
        "start_date",
        "end_date"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
