<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

class ProductImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'],
            'alt' => isset($row['alt']) ? $row['alt'] : null,
            'digest' => isset($row['digest']) ? $row['digest'] : null,
            'keywords' => isset($row['keywords']) ? $row['keywords'] : null,
            'description' => $row['description'],
            'tags' => isset($row['tags']) ? $row['tags'] : null,
            'is_in_top_list' => $row['is_in_top_list'],
            'visibility' => $row['visibility'],
            'priority' => $row['priority'],
            'price' => $row['price'],
            'category_id' => Category::where('name', '=', $row['category'])->first()->id,
            'brand_id' => Brand::where('name', '=', $row['brand'])->first()->id,
            'seller_id' => isset($row['seller']) ? Seller::where('name', '=', $row['seller'])->first()->id : null
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2',
            'category' => 'required|exists:categories,name',
            'brand' => 'required|exists:brands,name',
            'seller' => 'nullable|exists:sellers,name',
            'description' => 'required|string|min:2',
            'digest' => 'nullable|string|min:2',
            'keywords' => 'nullable|string|min:2',
            'tags' => 'nullable|string|min:2',
            'price' => 'required|integer|min:0',
            'priority' => 'required|integer|min:0',
            'is_in_top_list' => 'required|boolean',
            'visibility' => 'required|boolean',
            'alt' => 'nullable|string|min:2',
        ];
    }
}
