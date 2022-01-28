<nav class="w-full z-20 bg-white border-b-1 border-[#e9edf1] shadow-sm flex items-center justify-center p-3 relative">

    <a href="/">
        <h2 data-aos="zoom-in" class="mx-5 text-2xl font-extrabold">Wonoly</h2>
    </a>
    <ul class="list-none flex items-center jusitfy-around opacity-70">
        <li class="mx-6" data-aos="zoom-in" data-aos-delay="100"><a href="#">Announcements</a></li>
        <li class="mx-6" data-aos="zoom-in" data-aos-delay="200"><a href="#">Search</a></li>
        <li class="mx-6" data-aos="zoom-in" data-aos-delay="300"><a href="#">Browser</a></li>
        <li class="mx-6" data-aos="zoom-in" data-aos-delay="400"><a href="#">Comunity</a></li>
    </ul>
    <div class="w-full"></div>
    <div data-aos="fade-down" data-aos-delay="500" class="flex items-center justify-center">

        <div class="relative inline-block">
            <button onclick="dropdown()" class="dropbtn w-max padding-2 text-base border-none cursor-pointer bg-transparent flex items-center jusitfy-center">
                @if($user->profile->avatar_status == 0)
                    <img src="{{  Gravatar::get($user->email) }}" alt="{{ $user->name }}" width="30" class="rounded-full">
                @endif
                @if($user->profile->avatar_status == 1)
                    <img src="@if ($user->profile->avatar != NULL) {{ $user->profile->avatar }} @endif" alt="{{ $user->name }}" width="30" class="rounded-full">
                @endif
                <div class="ml-2 font-bold opacity-80">{{ $user->name }}</div>
                <svg class="opacity-80 ml-2.5" width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="myDropdown" class="min-w-fit w-full z-50 hidden absolute bg-white min-w-[160px] shadow-md border border-gray-300 mt-2 rounded p-1 dropdown-content">
                <a class="text-black py-3 px-2 no-underline block hover:bg-[rgb(243, 243, 243)] hover:text-black" href="/profile/{{ $user->name }}/edit">Settings</a>
                <a class="text-black py-3 px-2 no-underline block hover:bg-[rgb(243, 243, 243)] hover:text-black" href="/profile/{{ $user->name }}/edit/notifications">Notifications</a>
                <hr class="opacity-80 m-1">
                <a class="text-black py-3 px-2 no-underline block hover:bg-[rgb(243, 243, 243)] hover:text-black" href="/home">Account</a>
                <hr class="opacity-80 m-1">
                <form action="{{ route('logout') }}" method="post" class="cursor-pointer font-bold">

                    {{ csrf_field() }}

                    <label for="submit_logout" class="text-black py-3 px-2 cursor-pointer rounded transition-[background-color] font-bold no-underline block hover:text-white duration-300 hover:bg-red-400">Sign out</label>
                    <button type="submit" class="hidden" id="submit_logout"></button>
                </form>
            </div>
        </div>

    </div>
    <div data-aos="zoom-in" class="button ml-10 mr-2">Something</div>
</nav>