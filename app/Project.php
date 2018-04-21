<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $appends = ['last_reported', 'health'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function metrics()
    {
        return $this->hasMany(Metric::class);
    }

    public function getLastReportedAttribute()
    {
        $lastMetric = $this->latestMetric();
        return ($lastMetric) ? $lastMetric->created_at->diffForHumans() : null;
    }

    public function getHealthAttribute()
    {
        $lastMetric = $this->latestMetric();
        $coverage = 0;
        if ($lastMetric) {
            $coverage = ($lastMetric->coveredstatements / $lastMetric->statements) * 100;
        }

        switch ($coverage) {
            case $coverage >= 90:
                return asset('images/health/high.png');
                break;
            case $coverage <= 30:
                return asset('images/health/low.png');
                break;
            default:
                return asset('images/health/' . substr($coverage, 0, 1) . '.png');
                break;
        }
    }

    private function latestMetric()
    {
        return $this->metrics()->first();
    }
}
