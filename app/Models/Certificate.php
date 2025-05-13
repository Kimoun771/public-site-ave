<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Certificate extends Model
{
    protected $casts = [
        'expire_date' => 'datetime',
        'registration_date' => 'datetime',
    ];
    protected $fillable = [
        'certificate_number',
        'company_id',
        'registration_date',
        'expire_date',
    ];
    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getStatusAttribute(): string
    {
        $today = Carbon::now()->format('M-d-Y');
        $expire = optional($this->expire_date)->format('M-d-Y');
        return $expire <=  $today ? 'Suspend' : 'Valid';
    }

    protected static function booted()
    {
        static::saving(function (Certificate $certificate) {
            if ($certificate->expire_date && $certificate->expire_date->isFuture()) {
                $certificate->is_suspended = false;
            }
        });
    }

}
