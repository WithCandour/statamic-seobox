<li class="{{ $item->isActive() ? 'current' : '' }}">
    <a href="{{ $item->url() }}">
        <i>
            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"><path d="M16 8.093V4a1 1 0 00-1-1H2a1 1 0 00-1 1v10a1 1 0 001 1h7.129m6.458-9.337h-14.5m2.595-2.198v2m2.55-2.079v2M12.01 19.16v-3.35a3.878 3.878 0 013.878-3.879h1.566m-1.439-1.688l2.043 1.637m-.01.063l-2.043 1.637" stroke="currentColor" stroke-width=".75" fill="none" fill-rule="evenodd" stroke-linecap="round"/></svg>
        </i>
        <span>{{ __($item->name()) }}</span>
    </a>
    @if ($item->children() && $item->isActive())
        <ul>
            @foreach ($item->children() as $child)
                <li class="{{ $child->isActive() ? 'current' : '' }}">
                    <a href="{{ $child->url() }}">{{ __($child->name()) }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</li>
