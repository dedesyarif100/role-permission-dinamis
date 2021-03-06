<!DOCTYPE html>
<html lang="en">

@include('frontend.template.partials._head')

<body>
	
@include('frontend.template.partials._header')

    @yield('content')

    <div id="preloader"></div>
    
    @php
        $getWhatsapp = getWhatsapp();
    @endphp

    <a target="_blank" href="{{$getWhatsapp->link}}" class="whatsapp-button"><i class="bi bi-{{$getWhatsapp->icon}}"></i></a>
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

@include('frontend.template.partials._footer')

@include('frontend.template.partials._javascript')

</body>

</html>