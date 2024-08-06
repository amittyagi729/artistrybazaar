<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Blade;
use Config;



class CurrencyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
            
         Blade::directive('money', function ($amount) {
             return "<?php echo Config::get('constants.currency').''.$amount; ?>";
          });

    }
}
