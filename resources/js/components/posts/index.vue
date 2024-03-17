<script setup>
import { ref } from "vue";
const x = ref(0);

function onMousemove(e) {
    x.value = e.clientX;
}
</script>

<template>
    <div
        @mousemove="onMousemove"
        :style="{ backgroundColor: `hsl(${x}, 80%, 50%)` }"
        class="movearea w-full"
    >
        <div class="mt-20">
            <p
                style="
                    color: #ffffff;
                    -webkit-text-fill-color: transparent;
                    -webkit-text-stroke-width: 1px;
                "
                class="text-center text-white text-6xl p-5"
            >
                This is sample project
            </p>

            <div
                class="w-1/2 mx-auto border border-4 border-blue-400 p-3 bg-white"
            >
                <p dir="rtl" class="text-right mt-3">
                    <b>
                        پروژه ای که ملاحظه می نمایید از فریم ورک vuejs استفاده
                        گردیده است
                        <br />
                         و در قسمت غذاهای رستوران دار (seller) Elastic search نیز استفاده
                        گردیده است
                    </b>
                    <br />
                    این پروژه در سه قسمت ادمین، فروشنده و مشتری طراحی گردیده
                    است. که در قسمت ادمین داده های پایه ای تکمیل می گردد و در
                    قسمت فروشنده یا رستوران دار غذا ها تعریف می شود و اطلاعات
                    رستوران و غذا ها تکمیل می گردد در قسمت مشتری که به صورت API
                    تعریف شده است امکان ثبت نام، احراز هویت و ایجاد سبد خرید
                    بپردازد. از طریق نرم افزارهای postman, insomnia امکان پذیر
                    می باشد. فرانت این پروژه tailwind است.
                </p>
                <p dir="rtl" class="text-right mt-20">تست مسیرهای API :</p>

                <p>
                    Route::post('/register',[AuthController::class,'register']);<br />
                    Route::post('/login',[AuthController::class,'login']);<br />
                    Route::get('/addresses',
                    [AddressUserController::class,'index']);<br />
                    Route::post('/address/store',
                    [AddressUserController::class,'store']);<br />
                    Route::put('/address/update/{id}',
                    [AddressUserController::class,'update']);<br />

                    Route::put('/users/update/{user}',[UserController::class,'update']);<br />
                    Route::get('/restaurants',[RestaurantController::class,'index']);<br />
                    Route::get('/restaurant/{restaurant}',[RestaurantController::class,'show']);<br />

                    //foods<br />
                    Route::get('/foods',[FoodController::class,'index']);<br />
                    Route::get('/restaurants/{restaurant}/foods',[FoodController::class,'show']);<br />
                    Route::get('/foods/{food}',[FoodController::class,'show']);<br />
                    Route::get('/restaurants/{restaurant}/foods',[FoodController::class,'showRestaurantFoods']);<br />

                    //carts<br />
                    Route::post('/cart_items/add',
                    [CartController::class,'store']);<br />
                    Route::get('/cart_items',[CartController::class,'index']);<br />
                    Route::put('/cart_items/update/{id}',
                    [CartController::class,'update']);<br />
                    //
                    Route::get('/carts/{cart}',[CartController::class,'show']);<br />
                    Route::delete('/cart_items/destroy/{id}',[CartController::class,'destroy']);<br />
                    Route::get('/carts/confirm_cart',[CartController::class,'confirmCart']);<br />
                    Route::delete('/carts/destroy_cart/{cart_number}',[CartController::class,'destroyCart']);<br />
                    Route::get('/carts',[CartController::class,'cartIndex']);<br />

                    //orders<br />
                    Route::get('/orders/payment_order/{cart_number}/{restaurant_id}',
                    [OrderController::class,'paymentOrder']);<br />

                    //comment<br />
                    Route::post('/comments/add/{order}',
                    [CommentController::class,'store']);<br />

                    //reply<br />
                    Route::post('/replies/add/{comment}',
                    [ReplyController::class,'store']);<br />

                    //near Restaurants<br />
                    Route::get('/near_restaurants',[RestaurantController::class,'nearRestaurant']);<br />

                    //logout<br />
                    Route::post('/logout',[AuthController::class,'logout']);<br />
                </p>
                <p dir="rtl" class="text-right mt-20">دسترسی به یوزرها:</p>
                <p class="text-left">
                    admin <br />
                    user:admin@a.com<br />
                    password:12345678<br /><br />

                    seller<br />
                    user:seller@a.com<br />
                    password:12345678<br /><br />

                    customer<br />
                    user:api@a.com<br />
                    password:12345678<br /><br />

                    developer: Hamed Ebrahimzadeh
                </p>
            </div>
        </div>
    </div>
</template>
<style>
.movearea {
    transition: 0.3s background-color ease;
}
</style>
