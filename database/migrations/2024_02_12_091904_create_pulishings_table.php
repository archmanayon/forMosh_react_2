<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pulishings', function (Blueprint $table) {
            $table->id();
            $table->integer('publisher_number')->nullable();
$table->string('publisher_name')->nullable();
$table->string('isbn')->nullable();
$table->string('sku')->nullable();
$table->string('parent_isbn')->nullable();
$table->string('title')->nullable();
$table->string('author')->nullable();
$table->integer('page_count')->nullable();
$table->string('binding_type')->nullable();
$table->string('book_type_id')->nullable();
$table->decimal('list_price', 10, 2)->nullable();
$table->integer('wholesale_discount_%')->nullable();
$table->decimal('MTD_Quantity', 10, 2)->nullable();
$table->decimal('MTD_avg_list_price', 10, 2)->nullable();
$table->decimal('MTD_extended_list', 10, 2)->nullable();
$table->integer('MTD_avg_discount_%')->nullable();
$table->decimal('MTD_extended_discount', 10, 2)->nullable();
$table->decimal('MTD_avg_wholesale_price', 10, 2)->nullable();
$table->decimal('MTD_extended_wholesale', 10, 2)->nullable();
$table->decimal('MTD_avg_print_charge', 10, 2)->nullable();
$table->decimal('MTD_extended_print_charge', 10, 2)->nullable();
$table->decimal('MTD_gross_pub_comp', 10, 2)->nullable();
$table->decimal('MTD_extended_adjustments', 10, 2)->nullable();
$table->decimal('MTD_extended_recovery', 10, 2)->nullable();
$table->decimal('MTD_pub_comp', 10, 2)->nullable();
$table->decimal('YTD_quantity', 10, 2)->nullable();
$table->decimal('YTD_avg_list_price', 10, 2)->nullable();
$table->decimal('YTD_extended_list_price', 10, 2)->nullable();
$table->integer('YTD_avg_discount_%')->nullable();
$table->decimal('YTD_extended_discount', 10, 2)->nullable();
$table->decimal('YTD_avg_wholesale_price', 10, 2)->nullable();
$table->decimal('YTD_extended_wholesale', 10, 2)->nullable();
$table->decimal('YTD_avg_print_charge', 10, 2)->nullable();
$table->decimal('YTD_extended_print_charge', 10, 2)->nullable();
$table->decimal('YTD_gross_pub_comp', 10, 2)->nullable();
$table->decimal('YTD_extended_adjustments', 10, 2)->nullable();
$table->decimal('YTD_extended_recovery', 10, 2)->nullable();
$table->decimal('YTD_pub_comp', 10, 2)->nullable();
$table->decimal('deferral_balance', 10, 2)->nullable();
$table->string('reporting_currency_code')->nullable();
$table->date('period_name')->nullable();
$table->decimal('original_deferral_amount', 10, 2)->nullable();
$table->decimal('MTD_return_quantity', 10, 2)->nullable();
$table->decimal('MTD_return_wholesale', 10, 2)->nullable();
$table->decimal('MTD_return_charge', 10, 2)->nullable();
$table->decimal('MTD_return_total', 10, 2)->nullable();
$table->decimal('YTD_return_quantity', 10, 2)->nullable();
$table->decimal('YTD_return_wholesale', 10, 2)->nullable();
$table->decimal('YTD_return_charge', 10, 2)->nullable();
$table->decimal('YTD_return_total', 10, 2)->nullable();
$table->decimal('MTD_net_quantity', 10, 2)->nullable();
$table->decimal('MTD_net_wholesale', 10, 2)->nullable();
$table->decimal('MTD_net_pub_comp', 10, 2)->nullable();
$table->decimal('YTD_net_quantity', 10, 2)->nullable();
$table->decimal('YTD_net_wholesale', 10, 2)->nullable();
$table->decimal('YTD_net_pub_comp', 10, 2)->nullable();
$table->string('returns_flag_value')->nullable();
$table->date('nonreturnable_date')->nullable();
$table->string('title_status_flag_value')->nullable();
$table->date('cancelled_date')->nullable();
$table->string('publisher_imprint')->nullable();
$table->string('customer_flexfield1')->nullable();
$table->string('customer_flexfield2')->nullable();
$table->string('customer_flexfield3')->nullable();
$table->string('customer_flexfield4')->nullable();
$table->string('customer_flexfield5')->nullable();
$table->string('isbn_13')->nullable();
$table->decimal('MTD_wholesale_tax', 10, 2)->nullable();
$table->decimal('MTD_print_charge_tax', 10, 2)->nullable();
$table->decimal('MTD_return_wholesale_tax', 10, 2)->nullable();
$table->string('MTD_return_charge_tax')->nullable();
$table->decimal('YTD_wholesale_tax', 10, 2)->nullable();
$table->decimal('YTD_print_charge_tax', 10, 2)->nullable();
$table->decimal('YTD_return_wholesale_tax', 10, 2)->nullable();
$table->string('YTD_return_charge_tax')->nullable();
$table->string('market')->nullable();
$table->string('sales_category')->nullable();
$table->decimal('Mtd_global_distribution_fee', 10, 2)->nullable();
$table->decimal('Mtd_global_distribution_fee_tax', 10, 2)->nullable();
$table->decimal('Ytd_global_distribution_fee', 10, 2)->nullable();
$table->decimal('Ytd_global_distribution_fee_tax', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pulishings');
    }
};
