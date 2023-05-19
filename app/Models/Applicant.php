<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the Applicant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function academics()
    {
        return $this->hasMany(Academic::class, 'applicant_id', 'id');
    }
}
