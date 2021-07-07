<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings
{
    private $transactions;
    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    public function collection()
    {
        $transactions = $this->transactions;
        $arrTransaction = [];
        foreach($transactions as $key => $item)
        {
            $arrTransaction[]=[
                'id'        =>$item->id,
                'name'      =>$item->tst_name,
                'total'     =>number_format($item->tst_total_money,0,',','.'),
                'email'     =>$item->tst_email,
                'phone'     =>$item->tst_phone,
                'address'   =>$item->tst_address,
                'status'    =>$item->getStatus($item->tst_status)['name'],
                'type'      =>$item->tst_user_id ? 'Thành viên':'Khách',
                'create'    =>$item->created_at
            ];
        }
        return collect($arrTransaction);
    }
    public function headings(): array
    {
        return [
            '#',
            'name',
            'price',
            'email',
            'phone',
            'address',
            'status',
            'type',
            'create',
        ];
    }
}
