<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ["nom", "prenom", "email", "phone", "section", "image"];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employees_projects');
    }

    public function taches()
    {
        return $this->hasMany(Tache::class, 'employees_taches');
    }
}
