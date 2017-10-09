<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Item extends Model implements Transformable
{
    use TransformableTrait;

    public $services = 0;

    protected $fillable = [
        'nome','descricao','valor','status','id_categoria_item'
    ];


    public static function addItem(Request $request){
        session_start();

        $_SESSION['servicos'][] = $request->all();
        $services = $_SESSION['servicos'];
        self::listItem($services);
    }

    public static function listItem(array $sevices){
        $items = $sevices;
        return $items;

    }


}
