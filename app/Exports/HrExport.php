<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class HrExport implements FromCollection,ShouldAutoSize ,WithMapping , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return all employees request card in db
        return DB::table('employees')->where('status_card_requeste' ,'<>' ,0)->get();
    }

    public function map($user): array
    {

        return [
                $user->id,
                $user->name,
                $user->email,
                $user->phone,
                $user->department,                 
                $user->national_id,                 
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'name',
            'email',
            'phone',
            'depatrment',
            ' national id',
        ];
    }


}
