<?php

namespace App\Exports;

use App\Models\Trip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class TripsExport implements FromCollection ,WithMapping , WithHeadings , ShouldAutoSize ,WithStyles
{
	protected $trips;


	public function __construct($trips)
	{
		$this->trips = $trips;
	}


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return $this->trips;
    }


    /**
    * @var Invoice $invoice
    */
    public function map($trip): array
    {

    	return [
    		$trip->id ,
    		$trip->code,
    		optional($trip->market)->name , 
    		optional($trip->driver)->name , 
    		$trip->order_price,
    		$trip->delivery_price,
    		optional($trip->payment_method)->name_ar , 
    	];
    }



    public function headings(): array
    {
    	return [
    		'#',
    		'كود الرحله',
    		'الراسل'  , 
    		'السائق'  , 
    		'سعر الطلب',
    		'سعر التوصيل',
    		'طريقه الدفع'
    	];
    }

    public function styles(Worksheet $sheet)
    {

    	

    	$sheet->getStyle('A1:V1')->getFill()
    	->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    	->getStartColor()->setARGB('064126');
    	

    	// $sheet->cells('A1:D1', function ($cells) {
    	// 	$cells->setBackground('#008686');
    	// 	$cells->setAlignment('center');
    	// });
        // $sheet->getStyle('A:B')->getAlignment('center')->setHorizontal('center');
    	$sheet->getStyle('B:V')->getFont()->setBold(true);
    	$sheet->getStyle('B1:V1')->getFont()->setBold(true);
    	$sheet->getStyle('B1:V1')->getFont()->getColor()->setARGB('FFFFFF');
        // return [
        //     'A'  => ['font' => ['color' => '#FFFFFF']],
        //     'G'  => ['font' => ['color' => '#FFFFFF']],
        //     'F'  => ['font' => ['color' => '#FFFFFF']],
        //     'E'  => ['font' => ['color' => '#FFFFFF']],
        //     'D'  => ['font' => ['color' => '#FFFFFF']],
        //     'C'  => ['font' => ['color' => '#FFFFFF']],
        //     'B'  => ['font' => ['color' => '#FFFFFF']],
        // ];
    }





}
