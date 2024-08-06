@extends('layouts.app-new')
@section('title') 404 - Not Found @stop
@section('meta_description') 404 -Not Found @stop
@section('content')
<style>
#notfound {
    position: relative;
    height: 100vh;
}

#notfound .notfound {
    position: absolute;
    left: 50%;
    top: 30%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.notfound {
    min-width: 520px;
    width: 100%;
    line-height: 1.4;
    text-align: center;
}

.notfound .notfound-404 {
    position: relative;
    height: 200px;
    margin: 0px auto 20px;
    z-index: -1;
}

.notfound .notfound-404 h1 {
    font-family: 'Montserrat', sans-serif;
    font-size: 236px;
    font-weight: 200;
    margin: 0px;
    color: #211b19;
    text-transform: uppercase;
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.notfound .notfound-404 h2 {
    font-family: 'Montserrat', sans-serif;
    font-size: 28px;
    font-weight: 400;
    text-transform: uppercase;
    color: #211b19;
    background: #fff;
    padding: 10px 5px;
    margin: auto;
    display: inline-block;
    position: absolute;
    bottom: 0px;
    left: 0;
    right: 0;
}

.notfound-a {
    font-family: Inter;
    font-size: 20px;
    font-weight: 600;
    line-height: 32px;
    text-align: center;
    background: #fff;
    color: #000000;
    text-decoration: underline;
    margin-right: 20px;
}

.notfound a:hover {
    color: #ffffff;
    background: #07092B;
}

.oops {
    font-family: Inter;
    font-size: 25px;
    font-weight: 600;
    line-height: 32px;
    text-align: center;
    color: #CED4DA;
    margin-bottom: 0px;
}

.four04 {
    font-family: Inter;
    font-size: 120px;
    font-weight: 600;
    line-height: 20vh;
    text-align: center;
    color: #CED4DA;
    margin-bottom: 0px;
}

.not-found-text {
    font-family: Inter;
    font-size: 25px;
    font-weight: 600;
    line-height: 32px;
    text-align: center;
    color: #6D757E;
    margin-bottom: 0px;
}

.looks-like {
    font-family: Inter;
    font-size: 16px;
    font-weight: 600;
    line-height: 32px;
    text-align: center;
    color: #484F56;
    margin-bottom: 0px;
}

.img-404 {
    width: 400px;
    position: relative;
    left: 34%;
    height: 250px;
}

.m-12 {
    margin: 12px;
}

.p-40 {
    padding: 40px;
}

@media only screen and (max-width: 767px) {
    .notfound .notfound-404 h1 {
        font-size: 148px;
    }

    .img-404 {
        width: 288px;
        position: relative;
        left: 6%;
        height: 190px;
    }

    .notfound-a {
        font-size: 16px;
        margin-right: 14px;
    }

    .looks-like {
        line-height: 24px;
        font-size: 14px;
    }

    .p-40 {
        padding: 18px 15px;
    }

    .not-found-text {
        font-size: 22px;
        line-height: 35px;
    }

    .four04 {
        font-size: 90px;
        line-height: 14vh;
    }

    .m-12 {
        margin: 8px;
    }
}

@media only screen and (max-width: 480px) {
    .notfound .notfound-404 {
        height: 148px;
        margin: 0px auto 10px;
    }

    .notfound .notfound-404 h1 {
        font-size: 86px;
    }

    .notfound .notfound-404 h2 {
        font-size: 16px;
    }

    .notfound a {
        padding: 7px 15px;
        font-size: 14px;
    }
}
</style>
<!-- <div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <p class="oops">Oops!</p>
            <p class="four04">404</p>
            <p class="not-found-text">The Page can't be found</p>
            <p class="looks-like">It Looks Like nothing Was found at this Location. Try another link Or Click the button
                below.</p>
            <div>
                <a href="">GO BACK</a>
                <a href="{{ url('/')}}">HOME</a>
            </div>
            <div>
                <img src="{{asset('ab_assets/images/404.png')}}" width="100" height="100" alt="Handicraftsman"
                    loading="lazy" />
            </div>
        </div>
    </div>
</div> -->
<div class="p-40">
    <p class="oops">Oops!</p>
    <p class="four04">404</p>
    <p class="not-found-text">The Page can't be found</p>
    <p class="looks-like">It Looks Like nothing Was found at this Location. Try another link or Click the button
        below.</p>
    <div class="text-center m-12">
        <a href="{{ url('/')}}" class="notfound-a">GO BACK</a>
        <a href="{{ url('/')}}" class="notfound-a">HOME</a>
    </div>
    <div>
        <div class="img-404">
            <img src="{{asset('ab_assets/images/404.png')}}" width="100%" height="100%" alt="404" loading="lazy" />
        </div>
    </div>
</div>

@endsection