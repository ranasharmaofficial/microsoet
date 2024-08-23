<?php

namespace App\Exports;

use App\Models\ProductMaster;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductMasterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductMaster::all();
    }
}
