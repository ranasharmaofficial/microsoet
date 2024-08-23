<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use View;
use App\Models\Category;
use App\Models\Category_wise_brand;

class AppServiceProvider extends ServiceProvider {

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    //\DB::enableQueryLog(); // Enable query log
    Schema::defaultStringLength(191);
    Paginator::useBootstrap();

    $first_product_category_ids = Category::select('id')->where('level', 0)
            ->where('type', 1)
            ->get()
            ->pluck('id');

    $second_product_category_ids = Category::select('id')->whereIn('parent_id', $first_product_category_ids)
            ->where('level', 1)
            ->get()
            ->pluck('id');

    $first_service_category_ids = Category::select('id')->where('level', 0)
            ->where('type', 2)
            ->get()
            ->pluck('id');
    $second_service_category_ids = Category::select('id')->whereIn('parent_id', $first_service_category_ids)
            ->where('level', 1)
            ->get()
            ->pluck('id');

    $data = [
        'first_product_categories' => Category::select('id', 'name', 'slug', 'icon')->where('level', 0)->where('type', 1)->orderBy('order_level', 'ASC')->get(),
        'second_product_categories' => Category::select('id', 'name', 'slug', 'icon', 'parent_id')->whereIn('parent_id', $first_product_category_ids)->where('level', 1)->orderBy('order_level', 'ASC')->get(),
        'third_product_categories' => Category::select('id', 'name', 'slug', 'icon', 'parent_id')->whereIn('parent_id', $second_product_category_ids)->where('level', 2)->orderBy('order_level', 'ASC')->get(),
        'first_service_categories' => Category::select('id', 'name', 'slug', 'icon')->where('level', 0)->where('type', 2)->orderBy('order_level', 'ASC')->get(),
        'second_service_categories' => Category::select('id', 'name', 'slug', 'icon', 'parent_id')->whereIn('parent_id', $first_service_category_ids)->where('level', 1)->orderBy('order_level', 'ASC')->get(),
        'third_service_categories' => Category::select('id', 'name', 'slug', 'icon', 'parent_id')->whereIn('parent_id', $second_service_category_ids)->where('level', 2)->orderBy('order_level', 'ASC')->get(),
        'category_wise_brands' => Category_wise_brand::whereIn('category_id', $first_product_category_ids)->get(),
    ];


    // Your Eloquent query executed by using get()
    //dd(\DB::getQueryLog()); // Show results of log
    View::share($data);
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    //
  }

}
