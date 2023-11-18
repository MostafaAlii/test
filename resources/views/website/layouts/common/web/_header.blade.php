<div style="width:1245px;height:99px;margin:auto;">
    <div style="float:left;height:100px;width:250px;"><a href="index.html"><img
                src="{{ asset('website/resources/dashboard/resource/img/logo.png') }}" width="204" height="95"></a>
    </div>
    <div class="menuHomeOn">
        <div style="height:23px;"></div>
        <div style="width:120px;text-align:center;height:28px;color:#7BAE38;font-size:24px;"><a style="color:#7BAE38;"
                href="{{route('website.home')}}">HOME</a>
        </div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">Go to home</div>
        <div style="height:23px;"></div>
        <div class="arrow1"></div>
    </div>
    <div class="menuOff">
        <div style="height:23px;"></div>
        <div style="width:100px;text-align:center;height:28px;color:#006134;font-size:24px;"><a style="color:#006134;"
                href="{{route('website.home')}}">PRICES</a></div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">Go to prices</div>
        <div style="height:23px;"></div>
        <div class="arrow2"></div>
    </div>
    <div class="menuOff">
        <div style="height:23px;"></div>
        <div style="width:100px;text-align:center;height:28px;color:#8E1C58;font-size:24px;"><a style="color:#8E1C58;"
                href="{{--route('website.freeOrder')--}}">ORDER</a></div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">Go to order</div>
        <div style="height:23px;"></div>
        <div class="arrow3"></div>
    </div>
    <div class="menuOff">
        <div style="height:23px;"></div>
        <div style="width:100px;text-align:center;height:28px;color:#DD1A22;font-size:24px;">EXAMPLES</div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">Go to examples </div>
        <div style="height:23px;"></div>
        <div class="arrow4"></div>
    </div>
    <div class="menuOff">
        <div style="height:23px;"></div>
        <div style="width:100px;text-align:center;height:28px;color:#DD1A22;font-size:24px;">TOUR</div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">Go to tour</div>
        <div style="height:23px;"></div>
        <div class="arrow4"></div>
    </div>
    <div class="menuLogin">
        <div style="height:23px;"></div>
        <div style="width:100px;text-align:center;height:28px;color:#DC5224;font-size:24px;">FAQ</div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">Go to faq</div>
        <div style="height:23px;"></div>
        <div class="arrow5"></div>
    </div>
    @guest('web')
    <div class="menuLogin">
        <div style="height:23px;"></div>
        <div style="width:100px;text-align:center;height:28px;color:#DC5224;font-size:24px;"><a
                href="{{ route('login') }}">Login</a></div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">login</div>
        <div style="height:23px;"></div>
        <div class="arrow5"></div>
    </div>
    <div class="menuLogin">
        <div style="height:23px;"></div>
        <div style="width:100px;text-align:center;height:28px;color:#DC5224;font-size:24px;"><a
                href="{{ route('register') }}">Register</a></div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">Register</div>
        <div style="height:23px;"></div>
        <div class="arrow5"></div>
    </div>
    @endguest
    @auth('web')
    <div class="menuLogin">
        <div style="height:23px;"></div>
        <div style="width:100px;text-align:center;height:28px;color:#DC5224;font-size:24px;"><a
                href="{{ route('website.client.dashboard') }}">Dashboard</a></div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">{{ get_user_data()->name }}</div>
        <div style="height:23px;"></div>
        <div class="arrow5"></div>
    </div>
    <div class="menuLogin">
        <div style="height:23px;"></div>
        <div style="width:100px;text-align:center;height:28px;color:#DC5224;font-size:24px;">
            <a href="#" onclick="event.preventDefault(); document.getElementById('user-log-out').submit();">Sign-Out</a>
            <form id="user-log-out" action="{{ route(get_guard_name().'.logout') }}" method="POST">
                @csrf
            </form>
        </div>
        <div style="text-align:center;color:#777777;font-size:12px;width:120px;">Sign-Out</div>
        <div style="height:23px;"></div>
        <div class="arrow5"></div>
    </div>
    @endauth
    <div style="clear:both;"></div>
</div>