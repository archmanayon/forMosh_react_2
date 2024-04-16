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
        Schema::create('royalties', function (Blueprint $table) {
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
            $table->text('book_type_id')->nullable();
            $table->decimal('list_price', 10, 2)->nullable();
            $table->decimal('wholesale_discount_%', 5, 2)->nullable();
            $table->decimal('PTD_Quantity', 10, 2)->nullable();
            $table->decimal('PTD_avg_list_price', 10, 2)->nullable();
            $table->decimal('PTD_extended_list', 10, 2)->nullable();
            $table->decimal('PTD_avg_discount_%', 5, 2)->nullable();
            $table->decimal('PTD_extended_discount', 10, 2)->nullable();
            $table->decimal('PTD_avg_wholesale_price', 10, 2)->nullable();
            $table->decimal('PTD_extended_wholesale', 10, 2)->nullable();
            $table->decimal('PTD_avg_print_charge', 10, 2)->nullable();
            $table->decimal('PTD_extended_print_charge', 10, 2)->nullable();
            $table->decimal('PTD_gross_pub_comp', 10, 2)->nullable();
            $table->decimal('PTD_extended_adjustments', 10, 2)->nullable();
            $table->decimal('PTD_extended_recovery', 10, 2)->nullable();
            $table->decimal('PTD_pub_comp', 10, 2)->nullable();
            $table->decimal('YTD_quantity', 10, 2)->nullable();
            $table->decimal('YTD_avg_list_price', 10, 2)->nullable();
            $table->decimal('YTD_extended_list_price', 10, 2)->nullable();
            $table->decimal('YTD_avg_discount_%', 5, 2)->nullable();
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
            $table->string('period_name')->nullable();
            $table->decimal('original_deferral_amount', 10, 2)->nullable();
            $table->decimal('PTD_return_quantity', 10, 2)->nullable();
            $table->decimal('PTD_return_wholesale', 10, 2)->nullable();
            $table->decimal('PTD_return_charge', 10, 2)->nullable();
            $table->decimal('PTD_return_total', 10, 2)->nullable();
            $table->decimal('YTD_return_quantity', 10, 2)->nullable();
            $table->decimal('YTD_return_wholesale', 10, 2)->nullable();
            $table->decimal('YTD_return_charge', 10, 2)->nullable();
            $table->decimal('YTD_return_total', 10, 2)->nullable();
            $table->decimal('PTD_net_quantity', 10, 2)->nullable();
            $table->decimal('PTD_net_wholesale', 10, 2)->nullable();
            $table->decimal('PTD_net_pub_comp', 10, 2)->nullable();
            $table->decimal('YTD_net_quantity', 10, 2)->nullable();
            $table->decimal('YTD_net_wholesale', 10, 2)->nullable();
            $table->decimal('YTD_net_pub_comp', 10, 2)->nullable();
            $table->string('returns_flag_value')->nullable();
            $table->string('nonreturnable_date')->nullable();
            $table->string('title_status_flag_value')->nullable();
            $table->string('cancelled_date')->nullable();
            $table->string('publisher_imprint')->nullable();
            $table->string('customer_flexfield1')->nullable();
            $table->string('customer_flexfield2')->nullable();
            $table->string('customer_flexfield3')->nullable();
            $table->string('customer_flexfield4')->nullable();
            $table->string('customer_flexfield5')->nullable();
            $table->string('isbn_13')->nullable();
            $table->decimal('PTD_wholesale_tax', 10, 2)->nullable();
            $table->decimal('PTD_print_charge_tax', 10, 2)->nullable();
            $table->decimal('PTD_return_wholesale_tax', 10, 2)->nullable();
            $table->string('PTD_return_charge_tax')->nullable();
            $table->decimal('YTD_wholesale_tax', 10, 2)->nullable();
            $table->decimal('YTD_print_charge_tax', 10, 2)->nullable();
            $table->decimal('YTD_return_wholesale_tax', 10, 2)->nullable();
            $table->string('YTD_return_charge_tax')->nullable();
            $table->string('market')->nullable();
            $table->string('sales_category')->nullable();
            $table->decimal('PTD_global_distribution_fee', 10, 2)->nullable();
            $table->decimal('PTD_global_distribution_fee_tax', 10, 2)->nullable();
            $table->decimal('Ytd_global_distribution_fee', 10, 2)->nullable();
            $table->decimal('Ytd_global_distribution_fee_tax', 10, 2)->nullable();
            $table->timestamps();

            // $table->unique('isbn');
            
            // BISG upload table
            $table->string('ReportID')->nullable();
            $table->string('ReportDateTime')->nullable();
            $table->string('MessageFunction')->nullable();
            $table->string('SalesReportType')->nullable();
            $table->string('ReportPeriodFrom')->nullable();
            $table->string('ReportPeriodTo')->nullable();
            $table->string('ReportDate')->nullable();
            $table->string('ReportingPriceType')->nullable();
            $table->string('ReportingCurrency')->nullable();
            $table->string('ClassOfTrade/Sale')->nullable();
            $table->string('SalesTerritory')->nullable();
            $table->string('LineItemID#')->nullable();
            $table->string('SubAgentID#')->nullable();
            $table->string('SubAgentName')->nullable();
            $table->string('TransactionDateTime')->nullable();
            $table->string('AgentsTransactionID#')->nullable();
            $table->string('LineItemReferenceType')->nullable();
            $table->string('LineItemReferenceID#')->nullable();
            $table->string('LineItemReferenceDateTime')->nullable();
            $table->string('MainProductID#Type')->nullable();
            $table->string('AlternativeProductID#Type')->nullable();
            $table->string('AlternativeProductID#')->nullable();
            $table->string('ProductDescription')->nullable();
            $table->string('PublisherID#')->nullable();
            $table->string('PublisherName')->nullable();
            $table->string('ImprintName')->nullable();
            $table->string('DeviceType')->nullable();
            $table->integer('NetSoldQuantity')->nullable();
            $table->integer('NonSaleQuantity')->nullable();
            $table->string('NonSaleDisposalType')->nullable();
            $table->string('ClassOfTradeSale')->nullable();
            $table->string('PriceType')->nullable();
            $table->string('PriceCurrency')->nullable();
            $table->decimal('CommissionDiscountPercentage', 10, 2)->nullable();
            $table->decimal('ReturnedRefundedValue', 10, 2)->nullable();
            $table->string('FeeType1')->nullable();
            $table->decimal('FeeAmount1', 10, 2)->nullable();
            $table->string('FeeSource1')->nullable();
            $table->string('FeeType2')->nullable();
            $table->decimal('FeeAmount2', 10, 2)->nullable();
            $table->string('FeeSource2')->nullable();
            $table->string('FeeType3')->nullable();
            $table->decimal('FeeAmount3', 10, 2)->nullable();
            $table->string('FeeSource3')->nullable();
            $table->decimal('ProceedsOfSaleDuePublisher', 10, 2)->nullable();
            $table->integer('TotalNumberOfLineItems')->nullable();
            $table->integer('TotalGrossSoldQuantity')->nullable();
            $table->integer('TotalReturnedRefundedQuantity')->nullable();
            $table->integer('TotalNetSoldQuantity')->nullable();
            $table->integer('TotalNonSaleQuantity')->nullable();
            $table->decimal('TotalGrossSoldValue', 10, 2)->nullable();
            $table->decimal('TotalReturnedRefundedValue', 10, 2)->nullable();
            $table->decimal('TotalNetSoldValueBeforeFees', 10, 2)->nullable();
            $table->decimal('TotalFeesOfAllTypes', 10, 2)->nullable();
            $table->decimal('TotalProceedsDueToPublisher', 10, 2)->nullable();
            $table->string('Ebook Sales Models')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('royalties');
    }
};
