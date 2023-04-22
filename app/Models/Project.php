<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $fillable = [
        "name",
        "descricao",
        "observacao",
        "user_id",
        "tipo",
        "prioridade",
        "situacao",
        "data_alteracao",
        "responsavel_alteracao",
        "finalizado"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
