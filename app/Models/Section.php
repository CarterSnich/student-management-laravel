<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Number;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'goal',
        'color'
    ];

    protected function goalPercentage(): Attribute
    {
        $numOfStudents = Student::where('section_id', $this->attributes['id'])->get()->count();
        $percentage = ($numOfStudents / $this->attributes['goal']) * 100;

        return Attribute::make(
            get: fn () => $percentage,
        );
    }
}
