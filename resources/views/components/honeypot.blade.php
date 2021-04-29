@php
$myName = config('honeypot.myname_field');
$myTime = config('honeypot.elapsed_time_filled');

@endphp

<div class="hidden">
    {{-- We are are not displaying to catch bots.  --}}
    <label for="my_name">Spam Trick</label>
    <textarea class="w-full" name={{$myName}}></textarea>
    @error('my_name')
    <span class="mt-3 text-sm text-red-600">{{$message}}</span>
    @enderror
</div>
{{-- Using the microtime. We send time to the server and check how many seconds it the form was filled.  Then we reject it if is lesss than the seconds we define --}}
<div class="hidden mb-5">
    <label for="my_time">Checking Time</label>
    <input type="text" name={{$myTime}} class="w-full" value={{microtime(true)}}>
    @error('my_time')
    <span class="mt-3 text-sm text-red-600">{{$message}}</span>
    @enderror
</div>
