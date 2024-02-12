@if (session()->has('success'))
    <x-alert type="success">
    <i class="fa-solid fa-circle-check" style="color: #37e64c;"></i>
    {{ session('success') }}
    </x-alert>
@endif