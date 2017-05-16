<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vacancy_id', 'vacancy_url', 'vacancy_name', 'requirement', 'responsibility', 'salary_from', 'salary_to', 'salary_currency', 'employer_id', 'employer_url', 'employer_name', 'city'
    ];
}
