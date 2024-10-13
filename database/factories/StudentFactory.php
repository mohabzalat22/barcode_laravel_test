<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Picqer\Barcode\BarcodeGeneratorPNG;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $generator = new BarcodeGeneratorPNG();
        $barcode_name = time().'.png';
        sleep(1);
        $uuid = Str::uuid()->toString();
        file_put_contents(public_path('barcodes/' . $barcode_name), $generator->getBarcode($uuid, $generator::TYPE_CODE_128, 3, 50));
        return [
            'name' => fake()->name(),
            'uuid' => $uuid,
            'barcode' => $barcode_name
        ];
    }
}
