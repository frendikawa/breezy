<?php

namespace App\Charts;

use App\Models\Cart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProductChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $productCounts = Cart::groupBy('product_id')
            ->selectRaw('count(*) as count, product_id')
            ->get();

        $data = $productCounts->pluck('count')->toArray();
        $labels = [];

        // Loop through each product_id to get product information
        foreach ($productCounts as $productCount) {
            $product = Cart::where('product_id', $productCount->product_id)->first();
            if ($product) {
                $labels[] = $product->product->name;
            }
        }

        // Remove the dd($product) line if you want to continue with the code
        // dd($product);

        return $this->chart->DonutChart()
            ->setTitle('Diagram penjualan produk')
            ->setSubtitle('Produk terjual')
            ->addData($data)
            ->setLabels($labels);
    }
}
