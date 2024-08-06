<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\ShipmentTracking;
use App\Models\PaymentReminder;
use App\Traits\ValidationTrait;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPayementReminder;
use App\Models\User;
use Illuminate\Support\Str;
use Exception;

class ShipmentTrackingController extends Controller
{
    use ValidationTrait;

    public function index(){
        return view('admin.shipping.tracking.index');
    }
    public function ajaxStore(Request $req,ShipmentTracking $shipTrack):JsonResponse{

        $validation = ShipmentTrackingController::validateShippingTracking($req);
        if($validation->fails()) return response()->json(['errors',$validation->errors()],422);

        try{

            $ids = $sip = array();

            DB::beginTransaction();

            for($i=0;$i<count($req->productId);$i++){
                $sip['product'] = $shipTrack->create([
                    'po_id'=>$req->orderId[$i],
                    'product_id'=>$req->productId[$i],
                    'quantity_shipped'=> $req->shippingQty[$i],
                    'shipping_price_per_piece'=> $req->price_per_piece[$i],
                    'shipment_date'=> $req->shippingDate[$i],
                    'Shipment_Created_Date'=>$req->shippingDate[$i],
                    'payment_received'=>'due',
                ]);
                $ids[] = $sip['product']->id;
            }

            $sip['order_details'] = $order = Orders::findOrFail($req->orderId[0]);


           $sip['amt'] =  PaymentReminder::firstOrCreate([
                'order_id'=>$order->id,
                'user_id'=>$order->user_id,
                'payment_amt'=>$req->gtotal,
                'uuid'=> Str::uuid()->toString(),
                'related_shipping_ids'=> $ids,
                'payment_status'=>false,
                'is_open'=>false,
            ]);

            $copyPrevious =  !empty($order->content) ?[...$order->content] :'';

            $contend =[$copyPrevious,
                [
                    'payment_reminder_id'=>$sip['amt']->id,
                    'discount'=>$req->discountAmt,
                    'addition_charges'=>$req->addition_charges_amt,
                    'addition_charges_comment' => $req->addition_charges_reason
                ]
            ];

            Orders::where('id',$order->id)->update([
                'discount'=>$req->discountAmt,
                'content'=>serialize($contend)
            ]);

            $sip['user'] = User::where('id',$order->user_id)->first();
            /// mail method

            Mail::to($sip['user']->email)->send(new SendPayementReminder($sip));

            DB::commit();

            return response()->json(['message'=>'success','data'=>$req->all()]);
        }
        catch(Exception $err){
            DB::rollBack();
            return response()->json(['message'=>$err->getMessage()??$err],422);
        }

    }
}
