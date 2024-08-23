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
    
    $data = [
        'first_product_categories' => Category::select('id', 'name', 'slug', 'icon')->where('level', 0)->where('type', 1)->orderBy('order_level', 'ASC')->offset(0)->limit(11)->get(),        
        'first_service_categories' => Category::select('id', 'name', 'slug', 'icon')->where('level', 0)->where('type', 2)->orderBy('order_level', 'ASC')->offset(0)->limit(6)->get(),
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
