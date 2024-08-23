<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class SellerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'User Type',
            'Name',
            'Email',
            'Phone',
            'Display Name',
            'Designation',
            'Business Desc.'
        ];
    }

    protected $request;

    // public function __construct($status)
    // {
    //     $this->request = $status;
    // }
//
    // public function collection($status)
    public function collection()
    {
        return User::join('sellers', 'sellers.user_id', '=', 'users.id')->where('users.user_type', 'seller')->where('sellers.verification_status',1)
                    ->get(['users.user_type','users.name','users.email', 'users.phone', 'sellers.display_name','sellers.designation','sellers.business_description']);

    }

}
