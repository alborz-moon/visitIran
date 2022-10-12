<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromArray, WithHeadings
{
    protected $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function array(): array
    {
        return $this->products;
    }

    public function headings(): array
    {
        return ["ردیف", "امتیاز", "نام", "برند", "دسته", "تعداد موجودی", "آیا جز محصولات برتر است؟", "وضعیت نمایش", "اولویت", "قیمت"];
    }
}

?>