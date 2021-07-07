<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
    protected $guarded = [''];
    protected $status = [
        '1'=>[
            'class'=>'default',
            'name'=>'tiếp nhận',
        ],
        '2'=>[
            'class'=>'success',
            'name'=>'đang vận chuyển',
        ],
        '3'=>[
            'class'=>'info',
            'name'=>'đã bàn giao',
        ],
        '-1'=>[
            'class'=>'danger',
            'name'=>'hủy',
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->status,$this->tst_status,"[N/A]");
    }
}
