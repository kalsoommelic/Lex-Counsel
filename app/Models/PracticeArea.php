<?php

namespace App\Models;

use CodeIgniter\Model;

class PracticeArea extends Model
{
    protected $table = 'practice_areas';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'name',
        'slug',
        'short_description',
        'description',
        'icon',
        'image',
        'status',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}