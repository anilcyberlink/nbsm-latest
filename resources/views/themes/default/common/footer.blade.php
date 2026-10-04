<footer>
    <div class="wrap">
        <div class="footer-top">
            <div>
                <img
                    src="{{ asset('themes-assets/assets/img/logo-ondark.png')}}"
                    alt="{{ $setting->site_name }}"
                    style="width:150px;height:auto;display:block;margin:0 0 12px 0;"
                />
                <h5>{{ $setting->site_name }}</h5>
                {{-- <p style="font-size:13.5px;color:rgba(255,255,255,.55);margin-top:-8px;">Chartered Accountants</p> --}}
            </div>
            <div>
                <h5>Company</h5>
                <ul>
                    @foreach ($footer as $nav)
                        <li>
                            <a href="{{ url('page/' . posttype_url($nav->uri)) }}">{{ $nav->post_type }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h5>Services</h5>
                <ul>
                    @foreach ($services as $row)
                        <li>
                            <a href="{{ route('page.pagedetail', ['parent' => $service->uri, 'uri' => $row->uri]) }}">{{ $row->post_title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h5>Global</h5>
                <ul>
                    @foreach ($industries as $row)
                        <li>
                            <a href="{{ route('page.pagedetail', ['parent' => $industry->uri, 'uri' => $row->uri]) }}">{{ $row->post_title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h5>Contact</h5>
                <ul>
                    <li><a>{{ $setting->email_primary }}</a></li>
                    <li><a>{{ $setting->phone }}</a></li>
                    <li><a>{{ $setting->location1 }}</a></li>
                    <li><a>{{ $setting->address2 }}</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>{{ $setting->copyright_text }}</span>
            <span>Design &amp; Developed by <a href="https://cyberlink.com.np/" target="_blank">Cyberlink Pvt. Ltd.</a></span>
        </div>
    </div>
</footer>

@include('themes.default.common.search-modal')
<script src="{{ asset('themes-assets/assets/main.js') }}"></script>
</body>

</html>
