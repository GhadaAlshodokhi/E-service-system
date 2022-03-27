<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public static function isSaudi($id_number){

        $id = trim($id_number);
        if(!is_numeric($id)) return false;
        if(strlen($id) !== 10) return false;
        $type = substr ( $id, 0, 1 );
        if($type != 2 && $type != 1 ) return false;
        $sum = 0;
        for( $i = 0 ; $i<10 ; $i++ ) {
            if ( $i % 2 == 0){
                $ZFOdd = str_pad ( ( substr($id, $i, 1) * 2 ), 2, "0", STR_PAD_LEFT );
                $sum += substr ( $ZFOdd, 0, 1 ) + substr ( $ZFOdd, 1, 1 );
            }else{
                $sum += substr ( $id, $i, 1 );
            }
        }
        return $sum%10 ? false : true ;

    }
}
