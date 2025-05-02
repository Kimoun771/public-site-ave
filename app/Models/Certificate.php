<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Certificate extends Model
{
    protected $casts = [
        'expire_date' => 'datetime',
        'registration_date' => 'datetime',
        'is_suspended' => 'boolean',
    ];
    protected $fillable = [
        'certificate_number',
        'company_id',
        'registration_date',
        'expire_date',
        'is_suspended',
    ];
    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function getStatusAttribute()
    {
        if ($this->is_suspended) {
            return 'Suspend';
        }

        if ($this->expire_date && $this->expire_date->isPast()) {
            return 'Expired';
        }

        return 'Valid';
    }

}
