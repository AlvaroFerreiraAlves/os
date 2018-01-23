<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderService extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'equipamento','n_serie','p_info','p_const','s_exec','dt_prox_manut','valor_total','valor_desconto',
        'status','id_tipo_ordem_servico','id_cliente','id_empresa','id_usuario','tecnico'
    ];

    public function itensOrdem()
    {
        return $this->belongsToMany(Item::class, 'items_order_services', 'id_ordem_servico','id_item')->withPivot('valor','qtd');
    }

    public function cliente()
    {
        return $this->belongsTo(Customer::class,'id_cliente');
    }

    public function technician()
    {
        return $this->belongsTo(User::class,'tecnico');
    }

    public function empresa()
    {
        return $this->belongsTo(Company::class,'id_empresa');
    }

    public function totalOrdem(OrderService $orderService)
    {
        $total = 0;
        $items = $orderService->itensOrdem;
        foreach ($items as $item){
            $subTotal = $item->pivot->qtd * $item->pivot->valor;
            $total += $subTotal;
        }
        return $total;
    }



}
