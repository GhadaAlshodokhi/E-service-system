<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection,ShouldAutoSize ,WithMapping , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return all employees in db
        return DB::table('employees')->get();
    }

    public function map($user): array
    {

        return [
                $user->id,
                $user->name,
                $user->email,
                $user->phone,
                $user->national_id,                 
                $user->created_at,                 
                $user->status_account,                 
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'name',
            'email',
            'phone',
            ' national id',
            'created_at',
            'status_account',
        ];
    }

}
