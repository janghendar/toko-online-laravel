<?php

namespace App\Helpers;

use App\Action\CheckoutAction;
use App\Events\ProductOrdered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Product\Entities\ProductSellInfo;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Facades\XgPaymentGateway;

class PaymentHelper
{
    const SUCCESS_ROUTE = 'frontend.products.payment.success';
    const CANCEL_ROUTE = 'frontend.products.payment.cancel';

    private function getTitle($product_payment_info)
    {
        return 'Payment For Event Order Id: #' . $product_payment_info->id;
    }

    private function getDescription($product_payment_info)
    {
        return 'Payment For Order Id: #' . $product_payment_info->id . ' Payer Name: ' . $product_payment_info->name . ' Payer Email:' . $product_payment_info->email;
    }

    private static function formatPaymentInfo($product_payment_info, $ipn) : array
    {
        $description = __('Payment For Order Id: #') . $product_payment_info->id . ' '
            . __('Package Name:') . ' ' . $product_payment_info->package_name . ' '
            . __('Payer Name:') . ' ' . $product_payment_info->name . ' '
            . __('Payer Email:') . ' ' . $product_payment_info->email;

        return [
            'title' => __('Payment for order'),
            'name' => $product_payment_info->name, // user's name
            'email' => $product_payment_info->email, // user's email
            'description' => $description,
            'amount' => $product_payment_info->total_amount,
            'order_id' => $product_payment_info->id,
            'track' => $product_payment_info->payment_track,
            'payment_type' => 'order', // which kind of payment you are receiving
            'ipn_url' => $ipn,
            'success_url' => route(self::SUCCESS_ROUTE, Str::random(6) . $product_payment_info->id . Str::random(6)),
            'cancel_url' => route(self::CANCEL_ROUTE, Str::random(6) . $product_payment_info->id . Str::random(6)),
        ];
    }

    public static function chargeCustomer($product_payment_info, $request)
    {
        $instance = new static();

        $allowed_payment_methods = [
            'paypal',
            'paytm',
            'mollie',
            'stripe',
            'razorpay',
            'flutterwave',
            'paystack',
            'midtrans',
            'payfast',
            'cashfree',
            'instamojo',
            'marcadopago',
        ];

        if (in_array($product_payment_info->payment_gateway, $allowed_payment_methods)) {
            $type = $product_payment_info->payment_gateway;

            if ($type === 'paypal') {
                session()->put('order_id', $product_payment_info->id);
            }

            return PaymentGatewayRequestHelper::$type()->charge_customer(
                (new self)->formatPaymentInfo($product_payment_info, route("frontend.products.$type.ipn"))
            );
        }elseif ($product_payment_info->payment_gateway === 'cash_on_delivery') {
            event(new ProductOrdered([
                'order_id' => $product_payment_info->id,
            ]));

            $order_id = Str::random(6) . $product_payment_info->id . Str::random(6);

            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        }elseif ($product_payment_info->payment_gateway === 'manual_payment') {
            event(new ProductOrdered([
                'order_id' => $product_payment_info->id,
                'transaction_id' => $product_payment_info->transaction_id,
            ]));

            $order_id = Str::random(6) . $product_payment_info->id . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        }elseif ($product_payment_info->payment_gateway == 'bank_transfer') {

            event(new ProductOrdered([
                'order_id' => $product_payment_info->id,
                'transaction_id' => $product_payment_info->transaction_id,
            ]));

            $upload_link = CheckoutAction::uploadCheckoutImage($request, 'bank');

            if ($upload_link) {
                $product_payment_info->checkout_image_path = $upload_link;
                $product_payment_info->save();
            }
            $order_id = Str::random(6) . $product_payment_info->id . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        } elseif ($product_payment_info->payment_gateway == 'cheque_payment') {
            event(new ProductOrdered([
                'order_id' => $product_payment_info->id,
                'transaction_id' => $product_payment_info->transaction_id,
            ]));
            $upload_link = CheckoutAction::uploadCheckoutImage($request, 'cheque');
            if ($upload_link) {
                $product_payment_info->checkout_image_path = $upload_link;
                $product_payment_info->save();
            }
            $order_id = Str::random(6) . $product_payment_info->id . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        }

        return redirect()->route('homepage');
    }

    public function extraServiceAccept(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'order_id' => 'required|integer',
        ]);
        $extra_service_details = ExtraService::with('order')->find($request->id);
        //extraServiceAccept
        $selected_payment_gateway = $request->selected_payment_gateway;
        session()->put('order_id',$extra_service_details->id);
        if ($selected_payment_gateway === 'paypal'){
            try {
                return PaymentGatewayRequestHelper::paypal()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.paypal.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'mollie'){
            try {
                return PaymentGatewayRequestHelper::mollie()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.mollie.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'paytm'){
            try {
                return PaymentGatewayRequestHelper::paytm()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.paytm.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'stripe'){
            try {
                return PaymentGatewayRequestHelper::stripe()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.stripe.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'razorpay'){
            try {
                return PaymentGatewayRequestHelper::razorpay()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.razorpay.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'flutterwave'){
            try {
                return PaymentGatewayRequestHelper::flutterwave()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.flutterwave.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'paystack'){
            try {
                return PaymentGatewayRequestHelper::paystack()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.paystack.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'marcadopago'){
            try {
                return PaymentGatewayRequestHelper::marcadopago()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.marcadopago.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'instamojo'){
            try {
                return PaymentGatewayRequestHelper::instamojo()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.instamojo.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'cashfree'){
            try {
                return PaymentGatewayRequestHelper::cashfree()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.cashfree.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'payfast'){
            try {
                return PaymentGatewayRequestHelper::payfast()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.payfast.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'midtrans'){
            try {
                return PaymentGatewayRequestHelper::midtrans()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.midtrans.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'squareup'){
            try {
                return PaymentGatewayRequestHelper::squareup()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.squareup.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'cinetpay'){
            try {
                return PaymentGatewayRequestHelper::cinetpay()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.cinetpay.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }
        elseif ($selected_payment_gateway === 'paytabs'){
            try {
                return PaymentGatewayRequestHelper::paytabs()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.paytabs.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }

        }
        elseif ($selected_payment_gateway === 'billplz'){
            try {
                return PaymentGatewayRequestHelper::billplz()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.billplz.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }

        }
        elseif ($selected_payment_gateway === 'zitopay'){
            try {
                return PaymentGatewayRequestHelper::zitopay()->charge_customer($this->buildPaymentArg($extra_service_details,route('buyer.order.extra.service.payment.zitopay.ipn')));
            }catch (\Exception $e){
                toastr_error($e->getMessage());
                return back();
            }
        }

        toastr_error(__('something went wrong, try after sometime'));
        return redirect()->back();
    }

    private function buildPaymentArg($extra_service_details,$ipn_route){

        return [
            'amount' => $extra_service_details->total, // amount you want to charge from customer
            'title' => $extra_service_details->title, // payment title
            'description' => '', // payment description
            'ipn_url' => $ipn_route, //you will get payment response in this route
            'order_id' => $extra_service_details->id, // your order number
            'track' => \Str::random(36), // a random number to keep track of your payment
            'cancel_url' => route(self::CANCEL_ROUTE,$extra_service_details->id), //payment gateway will redirect here if the payment is failed
            'success_url' => route(self::SUCCESS_ROUTE,$extra_service_details->id), // payment gateway will redirect here after success
            'email' => $extra_service_details->order?->buyer?->email, // user email
            'name' => $extra_service_details->order?->buyer?->name, // user name
            'payment_type' => 'extra_service', // which kind of payment your are receving from customer
        ];
    }
}
