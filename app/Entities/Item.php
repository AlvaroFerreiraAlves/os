<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Item extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome','descricao','valor','status','id_categoria_item'
    ];

    private $items = [];

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        if( Session::has('items') ) {
            $item = Session::get('items');
            $this->items = $item->items;
        }
    }

    public function addItem(Item $item, $qtd){
        if(isset($this->items[$item->id])){
        }else{
            $this->items[$item->id] = [
                'item'=> $item,
                'qtd'=> $qtd,
            ];
        }
    }
    public function getItems()
    {
        return $this->items;
    }
    public function removeItems(Item $item)
    {
        if( isset($this->items[$item->id]) )
            unset($this->items[$item->id]);
    }
    public function total()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $subTotal = $item['item']->valor * $item['qtd'];
            $total += $subTotal;
        }
        return $total;
    }


}
