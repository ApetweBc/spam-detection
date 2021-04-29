<?php

namespace App\Honeypot;


use Closure;
use Illuminate\Http\Request;

class Honeypot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

    $config = config('honeypot');
    // Using the honey pot tecnique if it is not part of the request
    if(!$request->has($config['myname_field'])){
         return $this->abortMessage(); 
    }
    // Using the honey pot tecnique check if is not empty
    if(!empty($request->input($config['myname_field']))){
           return $this->abortMessage();
    }

    // Here we are checking the second and substracting it to time sent from the form. We set a condition if it does not meet it, we reject the form
     if($this->timeToSubmitForm($request) <= $config['mininum_time_field']){
          return $this->abortMessage();
     }

        return $next($request);
    }

    // We encapsulate the time in a method. keeping it clean
   protected function timeToSubmitForm(Request $request){
       return  microtime(true) - $request->input(config('honeypot.elapsed_time_filled'));
   }

   protected function abortMessage(){
       return abort(422, 'You are spam bitch');
   }

}
