<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // Remember the MongoDB extension!

class CourseRegistration extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'course_registrations';
    protected $guarded = [];
}
