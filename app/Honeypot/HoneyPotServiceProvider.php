<?php

namespace App\Honeypot;

use Illuminate\Support\ServiceProvider;

class HoneyPotServiceProvider extends ServiceProvider{

  public function register()
  {
   $this->mergeConfigFrom(__DIR__.'/config/honeypot.php', 'honeypot');
  }

  public function boot(){

  }

}
