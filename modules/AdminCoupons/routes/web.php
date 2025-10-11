<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminCoupons\Http\Controllers\AdminCouponsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ADMIN ROUTES
Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "admin/coupons"], function () {
        
        // THIS IS THE ONLY LINE YOU NEED FOR ADMIN CRUD
        // هذا هو السطر الوحيد الذي تحتاجه لعمليات الإدارة
        Route::resource('', AdminCouponsController::class)->names('admin.coupons');

        // These are custom routes, so we keep them.
        // هذه routes مخصصة، لذلك نحتفظ بها
        Route::post('list', [AdminCouponsController::class, 'list'])->name('admin.coupons.list');
        Route::post('save', [AdminCouponsController::class, 'save'])->name('admin.coupons.save');
        Route::post('status/{any}', [AdminCouponsController::class, 'status'])->name('admin.coupons.status');
    });
});


// APP (FRONTEND) ROUTES
Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "app/coupons"], function () {
        Route::post('apply', function (Request $request) {
            
            session()->forget('coupon');

            $coupon = DB::table("coupons")->where("code", $request->code)->where("status", 1)->first();

            if(empty($coupon))
                return response()->json([
                    "status" => 0,
                    "message" => __("The coupon code you entered does not exist. Please check and try again.")
                ]);

            if($coupon->start_date >= time())
                return response()->json([
                    "status" => 0,
                    "message" => sprintf( __("The coupon becomes active on %s."), datetime_show( $coupon->start_date ))
                ]);

            if($coupon->end_date != -1 && $coupon->end_date <= time())
                return response()->json([
                    "status" => 0,
                    "message" => __("The coupon you entered has expired. Please try another one or contact support for help.")
                ]);

            if($coupon->usage_limit != -1 && $coupon->usage_limit <= $coupon->usage_count)
                return response()->json([
                    "status" => 0,
                    "message" => __("This coupon has reached its usage limit and can no longer be used.")
                ]);

            session([ "coupon" => $coupon->id ]);

            return response()->json([
                "status" => 1,
                "redirect" => ""
            ]);

        })->name('app.coupons.apply');
    });
});
