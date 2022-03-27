<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Session;
use App\Exports\DateTime;

class EmployeeExport implements FromCollection,ShouldAutoSize ,WithMapping , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return all employees request card in db
        return DB::table('employees')->where('email' , Session::get('employee_login_email'))->get();
    }

    public function map($user): array
    {

        return [
                $user->name,
                $user->department,
                $user->hr_manegar_approve_at ,
                $user->card_expire_date_at = date('Y-m-d', strtotime('+1 year', strtotime($user->hr_manegar_approve_at)))
                
            ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Department',
            'Card Issue Date',
            'Card Expire Date',
        ];
    }


}
