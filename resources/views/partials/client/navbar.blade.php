<nav class="primary-menu navbar navbar-expand-lg">
    <div id="header-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            @if(Auth::check() && request()->segment(1) == 'profile')
            <li class="{{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                <a href="{{route('client.dashboard.index')}}">Dashboard</a>
            </li>
            <li class="{{ request()->segment(2) == 'transactions' ? 'active' : '' }}">
                <a href="{{route('client.transactions.index')}}">Transactions</a>
            </li>
            {{-- <li class="{{ request()->segment(2) == 'send-request' ? 'active' : '' }}">
                <a href="">Send/Request</a>
            </li>
            <li>
                <a href="{{route('client.help.index')}}">Help</a>
            </li> --}}
            @else
            <li class="{{ request()->segment(1) == 'send' ? 'active' : '' }}">
                <a href="{{route('client.send.create')}}">Send</a>
            </li>
            <li class="{{ request()->segment(1) == 'receive' ? 'active' : '' }}">
                <a href="{{route('client.receive.index')}}">Receive</a>
            </li>
            <li class="{{ request()->segment(1) == 'about' ? 'active' : '' }}">
                <a href="{{route('client.about.index')}}">About Us</a>
            </li>
            <li class="{{ request()->segment(1) == 'fees' ? 'active' : '' }}">
                <a href="{{route('client.fees.index')}}">Fees</a>
            </li>
            <li class="{{ request()->segment(1) == 'help' ? 'active' : '' }}">
                <a href="{{route('client.help.index')}}">Help</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
