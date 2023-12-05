<?php

namespace App\Models;
use App\Models\Role;
use App\Models\Department;
use App\Models\Campus;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Person extends Model
{
    use HasFactory;

    protected $table = 'Person';

    protected $fillable = [
        'username',
        'name',
        'name_of_record',
        'job_title',
        'email',
        'alias_email',
        'phone',
        'location',
        'fax',
        'website',
        'publishable',
        'lastApprovedAt',
        'lastApprovedBy',
        'pending',
    ];

    public $timestamps = false;

    public function pendingPerson()
    {
        return $this->hasOne(PendingPerson::class, 'person_id');
    }

    public function roles() {
        return $this-> belongsToMany(Role::class, 'Person_Role')->withPivot('role_id');
    }

    public function department() {
        return $this-> belongsToMany(Department::class, 'Person_Department', 'person_id', 'dept_id')->withPivot('dept_id');
    }

    public function campus()
    {
        return $this->belongsToMany(Campus::class, 'Person_Department', 'person_id', 'dept_id')
            ->withPivot('dept_id');
    }
};
