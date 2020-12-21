<?php

namespace App\Exports;

use App\Models\Trip;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class TripsExport implements FromView  , WithHeadings , ShouldAutoSize 
{
	protected $trips;


	public function __construct($trips)
	{
		$this->trips = $trips;
	}


    public function view(): View
    {
        return view('board.drivers.report-excel-view', [
            'trips' => $this->trips
        ]);
    }

    public function headings(): array
    {
    	return [
    		'#',
    		'الراسل'  , 
    		'المستقبل' ,
            'تاريخ الاستلام'  , 
            'تاريخ التسليم'  , 
    		'السائق'  , 
    		'سعر الطلب',
    		'سعر التوصيل',
    		'طريقه الدفع'
    	];
    }

  //   public function styles(Worksheet $sheet)
  //   {

  //      	$sheet->getStyle('A1:V1')->getFill()
  //   	->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
  //   	->getStartColor()->setARGB('55be95');
		// $sheet->getStyle('A:V')->getAlignment()->applyFromArray(
		//     array('horizontal' => 'center'  , 'vertical' => 'center' )
		// );
		// $sheet->getStyle('A1:V1')->getAlignment()->applyFromArray(
		//     array('horizontal' => 'center' , 'vertical' => 'center')
		// );
  //   	$sheet->getStyle('B:V')->getFont()->setSize(13);
  //   	$sheet->getStyle('B1:V1')->getFont()->setBold(true);
  //   	$sheet->getStyle('B1:V1')->getFont()->getColor()->setARGB('FFFFFF');
  //   }





}
