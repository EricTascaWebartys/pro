<!-- START SETTINGS-->
<div class="settings d-lg-inline-block d-none">
   <div class="settings-inner">
      <div class="settings-ctrl settings-zone">{{ __('navigation.Pro Area') }}</div>
      <div class="settings-content settings-zone">
         <p class="text-center text-gold-light" style="color: #fff">{{ __('navigation.Customer Area') }}</p>
         <div class="setting-colors">
            <div class="text-center">
                @if(Auth::user())
                    <a href="{{ route('dashboard') }}" class="btn-settings">{{ __('navigation.Access') }}</a>
                @else
                    <a href="{{ route('login') }}" class="btn-settings">{{ __('navigation.Login') }}</a>
                @endif
            </div>
         </div>

         <div class="text-center">
             <p class="text-center text-gold-light" style="margin:0 0 7px; color:#fff">{{ __('navigation.Call') }}</p>
             <a href="tel:0665469516" class="phone-number">06 65 46 95 16</a>
         </div>
      </div>
   </div>
</div>
@section('settings_options')
    <script defer type="text/javascript">
        $(document).on("click", function(event) {
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
