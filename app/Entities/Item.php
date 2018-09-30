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
    private $itemsUpdate = [];

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        if( Session::has('items') ) {
            $item = Session::get('items');
            $this->items = $item->items;
        }

        if( Session::has('itemsUpdate') ) {
            $itemUpdate = Session::get('itemsUpdate');
            $this->itemsUpdate = $itemUpdate->itemsUpdate;
        }
    }

    public function category()
    {
        return $this->belongsTo(CategoryItems::class, 'id_categoria_item');

    }

    public function addItem(Item $item, $qtd){
        if(isset($this->items[$item->id])){
            $this->items[$item->id] = [
                'item'=> $item,
                'qtd'=> $this->items[$item->id]['qtd'] + $qtd,

        ];
        }else{
            $this->items[$item->id] = [
                'item'=> $item,
                'qtd'=> $qtd,
            ];
        }
    }

    public function addItemUpdate(Item $itemUpdate, $qtd){
        if(isset($this->itemsUpdate[$itemUpdate->id])){
        }else{
            $this->itemsUpdate[$itemUpdate->id] = [
                'item'=> $itemUpdate,
                'qtd'=> $qtd,
            ];
        }
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getItemEndAdd($id)
    {
        return $this->items[$id];
    }

    public function getItemEndAddUpdate($id)
    {
        return $this->itemsUpdate[$id];
    }

    public function getItemsUpdate()
    {
        return $this->itemsUpdate;
    }

    public function removeItems(Item $item)
    {
        if( isset($this->items[$item->id]) )
            unset($this->items[$item->id]);
    }

    public function removeItemsUpdate(Item $itemUpdate)
    {
        if( isset($this->itemsUpdate[$itemUpdate->id]) )
            unset($this->itemsUpdate[$itemUpdate->id]);
    }

    public function total()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $subTotal = ($item['item']->valor * $item['qtd']) - ($item['item']->desconto);
            $total += $subTotal;
        }
        return $total;
    }

    public function totalUpdate()
    {
        $total = 0;
        foreach ($this->itemsUpdate as $item) {
            $subTotal = ($item['item']->pivot->valor * $item['qtd']);
            $total += $subTotal;
        }
        return $total;
    }


    public function emptySession()
    {
            Session::forget('items');
    }

    public function emptySessionUpdate()
    {
        Session::forget('itemsUpdate');
    }




}
