<?php

namespace App\Imports;

use App\Empresa;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class EmpresasImport implements ToModel, WithMultipleSheets
{

    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'empresa' => new FirstSheetImport(),
            'direccion' => new SecondSheetImport(),
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    
    public function model(array $row)
    {
        //print_r(ucwords(Str::lower($row[1])) . " - " . $row[0]);
      
        
        return new Empresa([
            'registro'  => $row[0],
            'razon'     => '' . ucwords(Str::lower($row[1])) 
        ]);
       
        
    }
    
}
