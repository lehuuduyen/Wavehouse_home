<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Products;
use App\Models\ImportExportCoupon;
use App\Models\ImportExportCouponProduct;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class ProductsImport extends DefaultValueBinder implements ToCollection, WithStartRow, WithValidation
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $price = 0;
        $quantity = 0;
        $products = [];
        $importExportCoupon = [];
        foreach ($rows as $row) {
            $products[] = Products::create([
                'code'     => !empty($row[0]) ? $row[0] : $this->generateRandomString(),
                'barcode'   => !empty($row[1]) ? $row[1] : $this->generateRandomString(),
                'name'   => $row[2],
                'price_capital'   => $row[3],
                'price_sell'   => $row[4],
                'price_old'   => $row[5],
                'count'   => $row[6],
            ]);
            $price += $row[3];
            $quantity += $row[6];
        }
        $importExportCoupon = ImportExportCoupon::create([
            'name' => preg_replace("/.xlsx|.xls/", "", $this->fileName),
            'code' => $this->generateRandomString(),
            'price' => $price,
            'supplier_id' => 1,
            'wavehouse_id' => 1,
            'status' => 1,
            'user_id' => 1
        ]);

        foreach ($products as $product) {
            $importExportCouponProduct = ImportExportCouponProduct::create([
                'product_id' => $product['id'],
                'coupon_id' => $importExportCoupon->id,
                'quantity' => $product['count'],
                'price' => $product['price_capital'],
                'wavehouse_id' => 1,
                'status' => 1,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '2' => 'required|string|max:255',
            '3' => 'required|numeric|digits_between:1,255',
            '4' => 'required|numeric|digits_between:1,255',
            '5' => 'required|numeric|digits_between:1,255',
            '6' => 'required|numeric|digits_between:1,255',
            Rule::unique('products', 'code')
                ->where(function ($query) {
                    if (!empty(request()->input('0'))) {
                        return true;
                    }
                    return false;
                }),
            Rule::unique('products', 'barcode')
                ->where(function ($query) {
                    if (!empty(request()->input('0'))) {
                        return true;
                    }
                    return false;
                })
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.unique' => 'Mã hàng đã tồn tại.',
            '1.unique' => 'Barcode đã tồn tại.',
            '0.string' => 'Mã hàng không hợp lệ.',
            '1.string' => 'Barcode không hợp lệ.',
            '0.max' => 'Mã hàng phải ít hơn 10 ký tự.',
            '1.max' => 'Barcode phải ít hơn 10 ký tự.',

            '2.required' => 'Tên không được để trống.',
            '3.required' => 'Giá nhập không được để trống.',
            '4.required' => 'Giá bán không được để trống.',
            '5.required' => 'Giá cũ không được để trống.',
            '6.required' => 'Tồn kho không được để trống.',

            '2.string' => 'Tên không không hợp lệ.',
            '3.numeric' => 'Giá nhập không hợp lệ.',
            '4.numeric' => 'Giá bán không hợp lệ.',
            '5.numeric' => 'Giá cũ không hợp lệ.',
            '6.numeric' => 'Tồn kho không hợp lệ.',
            
            '2.string' => 'Tên không không hợp lệ.',
            '3.digits_between' => 'Giá nhập tối đa 255 ký tự.',
            '4.digits_between' => 'Giá bán tối đa 255 ký tự.',
            '5.digits_between' => 'Giá cũ tối đa 255 ký tự.',
            '6.digits_between' => 'Tồn kho không hợp lệ.',
        ];
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
