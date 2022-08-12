<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return response()->json(OrderResource::collection(Order::all()));
    }

    public function store(OrderRequest $request){
        Order::create([
            'from_address' => $request->from_address,
            'to_address' => $request->to_address,
            'price' => $request->price,
            'phone' => '+992'.$request->phone
        ]);
        return response()->json([
            'message' => 'Заказ оформлен'
        ]);
    }

    public function edit($id){
        $order = Order::find($id);
        if($order){
            return response()->json(new OrderResource($order));
        }else{
            return response()->json($order);
        }
    }

    public function update(OrderRequest $request,$id){
        $order = Order::find($id);
        if($order){
            $order->update([
                'phone' => $request->phone,
                'price' => $request->price,
                'from_address' => $request->from_address,
                'to_address' => $request->to_address
            ]);
            return response()->json([
                'message' => 'Заказ успешно изменен'
            ]);
        }else{
            return response()->json(['message' => "Заказ с такой ID $id не найден"]);
        }
    }
    public function destroy($id){
        $order = Order::find($id);
        if($order){
            $order->delete();
            return response()->json(['message' => 'Успешно удалён']);
        }else{
            return response()->json(['message' => "Заказ с такой ID $id не найден"]);
        }
    }
}
