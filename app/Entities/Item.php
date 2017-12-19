<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Item extends Model implements Transformable
{
    use TransformableTrait;



    protected $fillable = [
        'nome','descricao','valor','status','id_categoria_item'
    ];

    public static function addItem($id){
        //session_start();
        $listItem = Item::find($id);
        $_SESSION['itens'][] = $listItem;

    }

    public static function listItem(){
        $_SESSION['itens'][] = null;
        $prodService = $_SESSION['itens'];
        $prodService = array_filter($prodService);

        return $prodService;
    }


}
