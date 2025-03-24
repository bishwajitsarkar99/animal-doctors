<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Medicine-part
use Database\Seeders\Medicine\MedicineGroupSeeder;
use Database\Seeders\Medicine\MedicineNameSeeder;
use Database\Seeders\Medicine\MedicineDosageSeeder;
use Database\Seeders\Medicine\MedicineOriginSeeder;
// Product Part
use Database\Seeders\Product\CategorySeeder;
use Database\Seeders\Product\SubCategorySeeder;
use Database\Seeders\Product\ProductGroupSeeder;
use Database\Seeders\Product\ProductNameSeeder;
use Database\Seeders\Product\UnitSeeder;
use Database\Seeders\Product\BrandSeeder;
use Database\Seeders\Product\ModelSeeder;
use Database\Seeders\Product\OriginSeeder;
use Database\Seeders\Product\ProductQuotationSeeder;

class ProductComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Medicine Part
        $this->call(MedicineGroupSeeder::class);
        $this->call(MedicineNameSeeder::class);
        $this->call(MedicineDosageSeeder::class);
        $this->call(MedicineOriginSeeder::class);
        // Product Part
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(ProductGroupSeeder::class);
        $this->call(ProductNameSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ModelSeeder::class);
        $this->call(OriginSeeder::class);
        $this->call(ProductQuotationSeeder::class);

    }

    // Use insert to add multiple records [ use the command : php artisan db:seed --class=ProductComponentSeeder]
}
