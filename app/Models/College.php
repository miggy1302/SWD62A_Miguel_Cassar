<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    // Enable mass assignment
    protected $fillable = ["name", "address"];

    //define the relationship with the Contact Model
    public function students(){
        return $this->hasMany(Student::class);
    }
}
