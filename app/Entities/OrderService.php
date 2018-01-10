<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderService extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    public function itensOrdem(){
        return $this->belongsToMany(ItemsOrderService::class, 'items_order_services', 'id_ordem_servico','id_item');
    }

}
