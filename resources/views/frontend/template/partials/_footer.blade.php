<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo">
                            <h2>
                                <img src="{{ asset('frontend/assets/images/Logo.png') }}" alt="Logo" style="width: 50%"></h2>
                            </div>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                            <div class="footer-icons">
                                <ul>
                                    <li>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    </li>
                                    <li>
                                    <a href="#"><i class="bi bi-twitter"></i></a>
                                    </li>
                                    <li>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    </li>
                                    <li>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>information</h4>
                            @php
                                $dataInformation = getInformation();
                            @endphp
                            {!! $dataInformation->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Recent Posts</h4>
                            <div class="flicker-img">
                            @php
                                $getRecentNews = getRecentNews();
                            @endphp
                            @foreach ($getRecentNews as $item)
                            <ul>
                                <li>
                                    <i class="bi bi-arrow-right-short"></i>
                                    &nbsp;
                                    <a href="{{ route('news.show', $item->slug) }}" style="color:black">
                                        {{$item->title}}
                                    </a><hr>
                                </li>
                            </ul>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                    <p>
                        &copy; Copyright <strong>Ananta Mitra Karya</strong>. All Rights Reserved
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>