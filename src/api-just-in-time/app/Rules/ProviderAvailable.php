<?php

namespace App\Rules;

use App\Models\UnavailableTimes;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class ProviderAvailable implements Rule
{
    protected $providerId;
    protected $startTime;
    protected $endTime;

    public function __construct($providerId, $startTime, $endTime)
    {
        $this->providerId = $providerId;
        $this->startTime = Carbon::createFromFormat('Y-m-d H:i', $startTime);
        $this->endTime = Carbon::createFromFormat('Y-m-d H:i', $endTime);
    }

    public function passes($attribute, $value)
    {
        return !UnavailableTimes::where('provider_id', $this->providerId)
            ->where('date', $this->startTime->toDateString())
            ->where(function ($query) {
                $query->whereBetween('start_time', [$this->startTime->toTimeString(), $this->endTime->toTimeString()])
                    ->orWhereBetween('end_time', [$this->startTime->toTimeString(), $this->endTime->toTimeString()]);
            })
            ->exists();
    }

    public function message()
    {
        return 'O provedor não está disponível neste horário.';
    }
}
