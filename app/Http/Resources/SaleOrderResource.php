<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'client' => $this->client()->value(),
                'payment_term' => $this->paymentTerm()->value(),
                'creation_date' => $this->creationDate()->value(),
                'created_by' => $this->createdBy()->value(),
                'state' => $this->state()->value(),
                'observation' => $this->observation()->value()
            ]
        ];
    }
}
