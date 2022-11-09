<!-- START SETTINGS-->
<div class="settings hide-down">
   <div class="settings-inner">
      <div class="settings-ctrl settings-zone">{{ __('navigation.PRO AREA') }}</div>
      <div class="settings-content settings-zone">
         <p class="text-center">{{ __('navigation.Customer Area') }}</p>
         <div class="setting-colors">
            {{-- <div class="setting-color bg-info checked" data-load-css="{{ asset('assets/front/frontend/site/css/theme-a.css') }}"><em class="fa fa-check"></em></div>
            <div class="setting-color bg-success" data-load-css="{{ asset('assets/front/frontend/site/css/theme-b.css') }}"><em class="fa fa-check"></em></div>
            <div class="setting-color bg-purple" data-load-css="{{ asset('assets/front/frontend/site/css/theme-c.css') }}"><em class="fa fa-check"></em></div>
            <div class="setting-color bg-primary" data-load-css="{{ asset('assets/front/frontend/site/css/theme-d.css') }}"><em class="fa fa-check"></em></div> --}}
            <div class="text-center">
                @if(Auth::user())
                    <a href="{{ route('dashboard') }}" class="btn-settings">{{ __('navigation.Access') }}</a>
                @else
                    <a href="{{ route('login') }}" class="btn-settings">{{ __('navigation.Login') }}</a>
                @endif
            </div>
         </div>

         <div class="text-center">
             <p class="text-center" style="margin:0 0 7px">{{ __('navigation.Call') }}</p>
             <a href="tel:0665469516" class="phone-number">06 65 46 95 16</a>
         </div>
      </div>
   </div>
</div>
@section('settings_options')
    <script type="text/javascript">
        $(document).click(function(event) {
            if(!$(event.target).closest('.settings-zone').length){
                $('.settings').removeClass('show');
            }
        });
        document.addEventListener('scroll', function (event) {
            $('.settings').removeClass('show');
        }, true);
    </script>
@endsection
<!-- END SETTINGS-->
