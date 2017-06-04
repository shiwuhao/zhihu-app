<li class="notifications {{ $notification->unread() ? 'unread' : '' }}">
    @if ($notification->unread())
        <a href="{{ url("notifications/{$notification->id}?redirect_url=inbox/{$notification->data['dialog']}") }}">{{ $notification->data['name'] }}</a>
    @else
        <a href="{{ url("inbox/{$notification->data['dialog']}") }}">{{ $notification->data['name'] }}</a>
    @endif
    给你发了一条私信
</li>