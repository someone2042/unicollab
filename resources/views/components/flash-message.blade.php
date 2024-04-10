@vite('resources/css/app.css')
@if(session()->has('message'))
<div class="fixed top-10 left-1/2 transform shadow-xl z-50 p-3 rounded-xl -translate-x-1/2 bg-green-700 text-white px-42 py-3">
    <p class="text-2xl">{{session('message')}} </p>
</div>
@endif