<div class="flex items-center justify-around px-2">
    {!! HTML::icon_link(route('social.redirect',['provider' => 'facebook']), 'fa fa-facebook', '', array('class' => 'w-10 h-10 rounded-md bg-blue-900 text-base flex items-center justify-center text-white')) !!}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'twitter']), 'fa fa-twitter', '', array('class' => 'w-10 h-10 rounded-md bg-blue-500 text-2xl flex items-center justify-center text-white')) !!}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'google']), 'fa fa-google', '', array('class' => 'w-10 h-10 rounded-md bg-white text-3xl flex items-center justify-center')) !!}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'github']), 'fa fa-github', '', array('class' => 'w-10 h-10 rounded-md bg-black text-2xl flex items-center justify-center text-white')) !!}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'twitch']), 'fa fa-twitch', '', array('class' => 'w-10 h-10 rounded-md bg-indigo-800 text-2xl flex items-center justify-center text-white')) !!}
</div>
