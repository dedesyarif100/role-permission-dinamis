<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\CategoryAsset;
use App\Models\Log;
use Illuminate\Database\Seeder;

class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryAssets = CategoryAsset::all();
        foreach ($categoryAssets as $key => $categoryAsset) {
            if ( $categoryAsset->code === 'IT' ) {
                $categoryIT = [
                    'Laptop Asus',
                    'Laptop Lenovo',
                    'Laptop Toshiba',
                    'Laptop Macbook Air',
                    'Laptop Macbook Pro',
                    'Laptop Thinkpad',
                    'Laptop Acer',
                    'Laptop Dell',
                    'Laptop Samsung',
                    'Laptop Microsoft'
                ];

                foreach ($categoryIT as $key => $value) {
                    $assets = $this->createAsset($key, $value, $categoryAsset);
                    $this->createLog($assets);
                }
            } elseif ( $categoryAsset->code === 'GA' ) {
                $categoryGeneralAffair = [
                    'Meja',
                    'Kursi',
                    'Papan tulis',
                    'WIFI',
                    'Kulkas',
                    'Kasur'
                ];

                foreach ($categoryGeneralAffair as $key => $value) {
                    $assets = $this->createAsset($key, $value, $categoryAsset);
                    $this->createLog($assets);
                }
            } elseif ( $categoryAsset->code === 'AC' ) {
                $categoryAC = [
                    'AC 250 volt',
                    'AC 350 volt',
                    'AC 450 volt',
                    'AC 550 volt'
                ];

                foreach ($categoryAC as $key => $value) {
                    $assets = $this->createAsset($key, $value, $categoryAsset);
                    $this->createLog($assets);
                }
            }
        }
    }

    /**
     * Run create Log
     *
     * @param object $assets
     * @return void
     */
    public function createLog($assets)
    {
        // $jsonData = {
        //     "name": "test",
        // };
        return Log::create([
            'date' => now(),
            'asset_id' => $assets->id,
            'type' => 10,
            'qty_in' => $assets->quantity,
            'qty_out' => 0,
            'notes' => $assets->notes,
            'json' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Run create Asset
     *
     * @param integer $key
     * @param object $value
     * @param object $categoryAsset
     * @return void
     */
    public function createAsset($key, $value, $categoryAsset)
    {
        return Asset::create([
            'category_id' => $categoryAsset->id,
            'code' => $categoryAsset->code.'.2022.000'.strval($key + 1),
            'name' => $value,
            'vendor_id' => 1,
            'quantity' => 5,
            'notes' => $value,
            'created_by' => 1,
            'updated_by' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
