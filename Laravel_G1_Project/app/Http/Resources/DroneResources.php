<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'drone_id'=>$this->drone_id,
            'battery_level' => $this->battery,
            'capacity' => $this->payload_capacity,
            'date_time' => $this->date_time,
            'locations' => new LocationResources($this->location)
        ];
    }
}
