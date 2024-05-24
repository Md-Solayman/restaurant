<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_settings = array(
            array(
                "id" => 1,
                "key" => "paypal_status",
                "value" => "1",
                "created_at" => "2024-01-02 09:47:56",
                "updated_at" => "2024-01-07 12:45:35",
            ),
            array(
                "id" => 2,
                "key" => "paypal_account_mode",
                "value" => "sandbox",
                "created_at" => "2024-01-02 09:47:56",
                "updated_at" => "2024-01-02 09:47:56",
            ),
            array(
                "id" => 3,
                "key" => "paypal_currency_name",
                "value" => "USD",
                "created_at" => "2024-01-02 09:47:56",
                "updated_at" => "2024-01-07 08:58:36",
            ),
            array(
                "id" => 4,
                "key" => "paypal_country_name",
                "value" => "US",
                "created_at" => "2024-01-02 09:47:56",
                "updated_at" => "2024-01-07 08:58:36",
            ),
            array(
                "id" => 5,
                "key" => "paypal_currency_rate",
                "value" => "0.0091",
                "created_at" => "2024-01-02 09:47:56",
                "updated_at" => "2024-01-07 08:58:36",
            ),
            array(
                "id" => 6,
                "key" => "paypal_api_key",
                "value" => "AUnOIw_wR15MzYo0eg87xjJ4bH2b_fsXVMtVtVZcpJVTrQC_rcStGAjyzBJK40vpaaCnYSvi1Gbf6L9f",
                "created_at" => "2024-01-02 09:47:56",
                "updated_at" => "2024-01-07 10:05:35",
            ),
            array(
                "id" => 7,
                "key" => "paypal_secret_key",
                "value" => "EPrUhxAOGPrnp_5-BkaI6UO0CQMyZ-F4ANGdm3Ye4QZofTuHjyzzJCZm3sP5hiSb4XKlUKOo-ozDddD3",
                "created_at" => "2024-01-02 09:47:56",
                "updated_at" => "2024-01-07 10:05:35",
            ),
            array(
                "id" => 8,
                "key" => "paypal_logo",
                "value" => NULL,
                "created_at" => "2024-01-02 09:47:56",
                "updated_at" => "2024-01-02 09:47:56",
            ),
            array(
                "id" => 9,
                "key" => "paypal_app_id",
                "value" => "APP_ID",
                "created_at" => "2024-01-02 16:20:07",
                "updated_at" => "2024-01-02 16:20:07",
            ),
            array(
                "id" => 10,
                "key" => "stripe_status",
                "value" => "1",
                "created_at" => "2024-01-04 09:46:43",
                "updated_at" => "2024-01-07 12:47:02",
            ),
            array(
                "id" => 11,
                "key" => "stripe_country_name",
                "value" => "US",
                "created_at" => "2024-01-04 09:46:43",
                "updated_at" => "2024-01-04 09:46:43",
            ),
            array(
                "id" => 12,
                "key" => "stripe_currency_name",
                "value" => "USD",
                "created_at" => "2024-01-04 09:46:43",
                "updated_at" => "2024-01-04 09:46:43",
            ),
            array(
                "id" => 13,
                "key" => "stripe_api_key",
                "value" => "pk_test_51MkjrQLsTclfnljCSXLbKQBWFfHHgiAiRi5pNr0sGvyr5SEl4Fmnh0cqe9KW0n2T7rPApzAe3OaIR6j7ONcRZIfF00LZ5UAzGf",
                "created_at" => "2024-01-04 09:46:43",
                "updated_at" => "2024-01-04 09:46:43",
            ),
            array(
                "id" => 14,
                "key" => "stripe_secret_key",
                "value" => "sk_test_51MkjrQLsTclfnljCh9KcaXQfgoBGs2or98ezRmvKOdBeR6KoVjEOpxdOMQrxZKyvbhGXAuAwwWBBoMbf2CAFX49800z107nOzS",
                "created_at" => "2024-01-04 09:46:43",
                "updated_at" => "2024-01-04 09:46:43",
            ),
            array(
                "id" => 15,
                "key" => "stripe_currency_rate",
                "value" => "0.0091",
                "created_at" => "2024-01-04 09:46:43",
                "updated_at" => "2024-01-04 09:46:43",
            ),
            array(
                "id" => 16,
                "key" => "razorpay_status",
                "value" => "1",
                "created_at" => "2024-01-06 07:21:07",
                "updated_at" => "2024-01-07 12:47:25",
            ),
            array(
                "id" => 17,
                "key" => "razorpay_currency_name",
                "value" => "INR",
                "created_at" => "2024-01-06 07:21:07",
                "updated_at" => "2024-01-06 07:21:07",
            ),
            array(
                "id" => 18,
                "key" => "razorpay_country_name",
                "value" => "IN",
                "created_at" => "2024-01-06 07:21:07",
                "updated_at" => "2024-01-06 07:21:07",
            ),
            array(
                "id" => 19,
                "key" => "razorpay_currency_rate",
                "value" => "0.76",
                "created_at" => "2024-01-06 07:21:07",
                "updated_at" => "2024-01-06 07:21:07",
            ),
            array(
                "id" => 20,
                "key" => "razorpay_api_key",
                "value" => "rzp_test_K7CipNQYyyMPiS",
                "created_at" => "2024-01-06 07:21:07",
                "updated_at" => "2024-01-06 07:21:07",
            ),
            array(
                "id" => 21,
                "key" => "razorpay_secret_key",
                "value" => "zSBmNMorJrirOrnDrbOd1ALO",
                "created_at" => "2024-01-06 07:21:07",
                "updated_at" => "2024-01-06 07:21:07",
            ),
        );

        DB::table('payment_settings')->insert($payment_settings);
    }
}
