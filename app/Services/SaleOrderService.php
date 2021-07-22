<?php 

namespace App\Services;
use App\Models\SaleOrder;
use App\Repositories\SaleOrderRepository;
use App\Services\Interfaces\SaleOrderServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class SaleOrderService implements SaleOrderServiceInterface
{

	private $saleOrderRepository;
	
	public function __construct(SaleOrderRepository $saleOrderRepository)
	{
		$this->saleOrderRepository = $saleOrderRepository;
	}

	public function create(array $data)
	{
		DB::transaction(function () use ($data){
			$saleOrder = $this->saleOrderRepository->create($data);

			foreach($data['items'] as $item)
			{
				$this->saleOrderRepository->createItem($saleOrder->id, $item);
			}
		});
	}

    public function read()
    {
    	$saleOrder = $this->saleOrderRepository->read();
        return response()->json($saleOrder);
    }

    public function update(array $data, $id)
    {
    	DB::transaction(function () use ($data, $id){

            $this->saleOrderRepository->update($data, $id);

            $saleOrder = SaleOrder::find($id);

            $idItem = $saleOrder->items->pluck('id')->all();

            $idCompare = Arr::pluck($data['items'], 'id');

            $notIn = array_values(array_diff($idItem, $idCompare));

            if (!empty($notIn))
                {
                    $saleOrder->items()->whereIn('id', $notIn)->delete();
                }

    		foreach($data['items'] as $item)
    		{
    			$this->saleOrderRepository->updateItem($item);
    		}
        });
    }

    public function delete($id)
    {
    	$this->saleOrderRepository->delete($id);
    }

    public function readById($id)
    {
    	$itemsSaleOrders = $this->saleOrderRepository->readById($id);
    	return response()->json($itemsSaleOrders);
    }
}

?>