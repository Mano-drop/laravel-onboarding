<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\DB;

class InvoiceRepository implements BaseRepositoryInterface
{
    private $invoice;
    private $invoiceItem;
    private $invoiceGet;
    private $invoiceNew;
    private $invoiceUp;
    private $result = false;

    public function __construct(Invoice $invoice, InvoiceItem $invoiceItem)
    {
        $this->invoice = $invoice;
        $this->invoiceItem = $invoiceItem;
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {

            $this->invoiceNew = $this->invoice->create($data);

            $invoiceItems = [];

            foreach ($data['items'] as $item) {
                $invoiceItems[] = new InvoiceItem($item);
            }

            $this->invoiceNew->invoiceItems()->saveMany($invoiceItems);

            $this->result = true;

        });

        return $this->result;
    }

    public function read()
    {
        return $this->invoice->all()->toJson();
    }

    public function update(array $data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $this->invoiceGet = $this->invoice->find($id);

            if ($this->invoiceGet) {
                $this->invoiceGet->update([
                    'supplier' => $data['supplier'],
                    'pay_term' => $data['pay_term'],
                    'date' => $data['date'],
                    'created' => $data['created'],
                    'status' => $data['status'],
                    'observations' => $data['observations']
                ]); //actualiza

                $invoiceItem = [];

                foreach ($data['items'] as $item) {
                    $invoiceItemGet = $this->invoiceItem->find($item['id']);

                    if (!empty($invoiceItemGet)) {
                        //actualizar
                        $invoiceItemGet->update([
                            'name' => $item['name'],
                            'amount' => $item['amount'],
                            'price' => $item['price'],
                            'subtotal' => $item['subtotal']
                        ]);
                    } else {
                        //crear uno nuevo
                        $invoiceItem[] = new InvoiceItem($item);
                    }
                }

                $this->invoiceGet->invoiceItems()->saveMany($invoiceItem);

                $this->result= true;
            }
        });

        return $this->result;
    }

    public function delete($id)
    {
        $this->invoiceGet = $this->invoice->find($id);

        if ($this->invoiceGet) {

            $this->invoiceItem->where('invoice_id', $this->invoiceGet->id)->delete();

            $this->invoiceGet->delete();

            $this->result = true;
        }

        return $this->result;
    }

    public function readById($id)
    {
        $this->invoiceGet = $this->invoice->find($id);

        if ($this->invoiceGet != null) {

            $this->invoiceGet->invoiceItems;

            return $this->invoiceGet->toJson();

        }
    }
}
