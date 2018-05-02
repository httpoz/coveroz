<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'hook_id'];
    protected $appends = ['last_reported', 'last_commit', 'health', 'health_img'];

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
        return ($lastMetric) ? $lastMetric->created_at->diffForHumans() : '-';
    }

    public function getLastCommitAttribute()
    {
        $lastMetric = $this->latestMetric();
        return ($lastMetric) ? $lastMetric->commit : '-';
    }

    public function getHealthAttribute() : float
    {
        return $this->healthPercentage();


    }

    public function getHealthImgAttribute()
    {
        $coverage = $this->healthPercentage();
        switch (true) {
            case ($coverage >= 90):
                return asset('images/health/high.png');
                break;
            case ($coverage <= 40):
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

    private function healthPercentage(): float
    {
        $lastMetric = $this->latestMetric();
        $coverage = 0;
        if ($lastMetric) {
            $coverage = round(($lastMetric->coveredstatements / $lastMetric->statements) * 100, 2);
        }

        return $coverage;
    }
}
