<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;


class UsersExport implements FromCollection, WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function registerEvents(): array
    {
        $styleArray = [
            'font'=>[
                'bold'=>true,
            ]
            ];
        return [AfterSheet::class=> function (AfterSheet $event) use ($styleArray){
$event->sheet->getStyle("A1:G1")->applyFromArray($styleArray);
        },];

        }
    public function collection()
    {
        return User::select ('id',
        'name',
        'email',
        'email_verified_at',
        'created_at'		,

        'updated_at',
        'avatar')->get();
    }
    public function headings():array
    {
        return [
            'Id',
        'Name',
        'Email',
        'Email_verified_at',
        'Created_at'		,

        'Updated_at',
        'Avatar'
        ];
    }
}
