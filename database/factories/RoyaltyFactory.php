<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Royalty>
 */
class RoyaltyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'market' => $this->faker->numberBetween(0000001,9999999),
            'publisher_name' => $this->faker->text(10),
            'isbn' => $this->faker->regexify('[0-9A-Z]{10}'),
            'sku' => $this->faker->regexify('[0-9A-Z]{10}'),
            'parent_isbn' => $this->faker->regexify('[A-Za-z0-9]{13}'),
            'title' => $this->faker->text(10),
            'author' => $this->faker->text(10),
            'page_count' => $this->faker->numberBetween(00001,99999),
            'binding_type' => $this->faker->text(10),
            'book_type_id' => $this->faker->text(10),
            'list_price' => $this->faker->randomFloat(2, 0, 1000),
            'wholesale_discount_%' => $this->faker->randomFloat(2, 0, 100),
            'MTD_Quantity' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_avg_list_price' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_extended_list' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_avg_discount_%' => $this->faker->randomFloat(2, 0, 100),
            'MTD_extended_discount' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_avg_wholesale_price' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_extended_wholesale' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_avg_print_charge' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_extended_print_charge' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_gross_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_extended_adjustments' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_extended_recovery' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_quantity' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_avg_list_price' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_extended_list_price' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_avg_discount_%' => $this->faker->randomFloat(2, 0, 100),
            'YTD_extended_discount' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_avg_wholesale_price' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_extended_wholesale' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_avg_print_charge' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_extended_print_charge' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_gross_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_extended_adjustments' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_extended_recovery' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
            'deferral_balance' => $this->faker->randomFloat(2, 0, 1000),
            'reporting_currency_code' => $this->faker->text(10),
            'period_name' => $this->faker->dateTimeBetween('-3 years', '-1 years'),
            'original_deferral_amount' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_return_quantity' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_return_wholesale' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_return_charge' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_return_total' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_return_quantity' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_return_wholesale' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_return_charge' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_return_total' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_net_quantity' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_net_wholesale' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_net_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_net_quantity' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_net_wholesale' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_net_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
            'returns_flag_value' => $this->faker->text(10),
            'nonreturnable_date' => $this->faker->dateTimeBetween('-3 years', '-1 years'),
            'title_status_flag_value' => $this->faker->text(10),
            'cancelled_date' => $this->faker->dateTimeBetween('-3 years', '-1 years'),
            'publisher_imprint' => $this->faker->text(10),
            'customer_flexfield1' => $this->faker->text(10),
            'customer_flexfield2' => $this->faker->text(10),
            'customer_flexfield3' => $this->faker->text(10),
            'customer_flexfield4' => $this->faker->text(10),
            'customer_flexfield5' => $this->faker->text(10),
            'isbn_13' => $this->faker->regexify('[0-9A-Z]{13}'),
            'MTD_wholesale_tax' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_print_charge_tax' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_return_wholesale_tax' => $this->faker->randomFloat(2, 0, 1000),
            'MTD_return_charge_tax' => $this->faker->text(10),
            'YTD_wholesale_tax' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_print_charge_tax' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_return_wholesale_tax' => $this->faker->randomFloat(2, 0, 1000),
            'YTD_return_charge_tax' => $this->faker->text(10),
            'market' => $this->faker->text(10),
            'sales_category' => $this->faker->text(10),
            'Mtd_global_distribution_fee' => $this->faker->randomFloat(2, 0, 1000),
            'Mtd_global_distribution_fee_tax' => $this->faker->randomFloat(2, 0, 1000),
            'Ytd_global_distribution_fee' => $this->faker->randomFloat(2, 0, 1000),
            'Ytd_global_distribution_fee_tax' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
