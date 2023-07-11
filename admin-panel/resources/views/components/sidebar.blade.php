@php
    $menuItems = [['url' => '/home', 'label' => 'Home', 'icon' => 'fa-home'], ['url' => '/users', 'label' => 'Users', 'icon' => 'fa-user-circle'], ['url' => '/clients', 'label' => 'Clients', 'icon' => 'fa-users'], ['url' => '/members', 'label' => 'Members', 'icon' => 'fa-id-badge']];
@endphp


<div class="py-4">
    <h2 class="text-white px-6 py-5 bg-green-600 font-bold mb-4">{{ $title }}</h2>
    <ul>
        @foreach ($menuItems as $item)
            <li
                class="py-2 flex items-center justify-start px-6 text-white hover:text-slate-900 hover:bg-gray-100 hover:rounded-l-[18px]">
                <a href="{{ $item['url'] }}"><i class="fa {{ $item['icon'] }} mr-3"
                        aria-hidden="true"></i>{{ $item['label'] }}</a>
            </li>
        @endforeach
    </ul>
</div>
{{-- <a href="/home" class="w-full"> <i class="fa fa-home mr-3" aria-hidden="true"></i> Home</a> --}}
