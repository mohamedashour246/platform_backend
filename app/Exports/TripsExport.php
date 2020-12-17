<?php

namespace App\Exports;

use App\Models\Trip;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class TripsExport implements FromArray ,WithMapping , WithHeadings
{
	protected $trips;


	public function __construct(array $trips)
    {
        $this->trips = $trips;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return $this->trips;
    }


        /**
    * @var Invoice $invoice
    */
    public function map($trip): array
    {

        return [
        	$trip['id'] ,
            $trip['code'],
            $trip['order_price'],
        ];
    }



    public function headings(): array
    {
        return [
            '#',
            'كود الرحله',
            'سعر التوصيل',
        ];
    }



}
