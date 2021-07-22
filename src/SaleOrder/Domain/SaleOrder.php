<?php

namespace Src\SaleOrder\Domain;

use Src\SaleOrder\Domain\ValueObjects\SaleOrderClient;
use Src\SaleOrder\Domain\ValueObjects\SaleOrderPaymentTerm;
use Src\SaleOrder\Domain\ValueObjects\SaleOrderCreationDate;
use Src\SaleOrder\Domain\ValueObjects\SaleOrderCreatedBy;
use Src\SaleOrder\Domain\ValueObjects\SaleOrderObservation;
use Src\SaleOrder\Domain\ValueObjects\SaleOrderState;

final class SaleOrder
{
    private $client;
    private $paymentTerm;
    private $creationDate;
    private $createdBy;
    private $state;
    private $observation;

    public function __construct(
        SaleOrderClient $client,
        SaleOrderPaymentTerm $paymentTerm,
        SaleOrderCreationDate $creationDate,
        SaleOrderCreatedBy $createdBy,
        SaleOrderState $state,
        SaleOrderObservation $observation
    )
    {
        $this->client = $client;
        $this->paymentTerm = $paymentTerm;
        $this->creationDate = $creationDate;
        $this->createdBy = $createdBy;
        $this->state = $state;
        $this->observation = $observation;
    }

    public function client(): SaleOrderClient
    {
        return $this->client;
    }

    public function paymentTerm(): SaleOrderPaymentTerm
    {
        return $this->paymentTerm;
    }

    public function creationDate(): SaleOrderCreationDate
    {
        return $this->creationDate;
    }

    public function createdBy(): SaleOrderCreatedBy
    {
        return $this->createdBy;
    }

    public function state(): SaleOrderState
    {
        return $this->state;
    }

    public function observation(): SaleOrderObservation
    {
        return $this->observation;
    }

    public static function create(
        SaleOrderClient $client,
        SaleOrderPaymentTerm $paymentTerm,
        SaleOrderCreationDate $creationDate,
        SaleOrderCreatedBy $createdBy,
        SaleOrderState $state,
        SaleOrderObservation $observation
    ): SaleOrder
    {
        $saleOrder = new self($client, $paymentTerm, $creationDate, $createdBy, $state, $observation);

        return $saleOrder;
    }
}