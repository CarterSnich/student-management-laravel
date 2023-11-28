<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'firstname',
        'lastname',
        'middlename',
        'birthdate',
        'section_id'
    ];

    protected function fullName(): Attribute
    {
        $firstname = $this->attributes['firstname'];
        $lastname = $this->attributes['lastname'];
        $middlename = $this->attributes['middlename'] ?? '';
        $fullName = "$lastname, $firstname" . " $middlename";
        return Attribute::make(
            get: fn () => $fullName,
        );
    }

    protected function formattedStudentId(): Attribute
    {
        $s = $this->attributes['student_id'];
        $p1 = substr($s, 0, 3);
        $p2 = substr($s, 3);
        $studentId = "$p1-$p2";
        return Attribute::make(
            get: fn () => $studentId
        );
    }
}
