<?php

namespace App\Models;

use CodeIgniter\Model;

class Attorney extends Model
{
    protected $table = 'attorneys';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'name',
        'slug',
        'designation',
        'specialization',
        'bio',
        'image',
        'email',
        'phone',
        'linkedin',
        'status',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}