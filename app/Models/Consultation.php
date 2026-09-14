<?php

namespace App\Models;

use CodeIgniter\Model;

class Consultation extends Model
{
    protected $table = 'consultations';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'case_type',
        'preferred_date',
        'preferred_time',
        'message',
        'status',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}
