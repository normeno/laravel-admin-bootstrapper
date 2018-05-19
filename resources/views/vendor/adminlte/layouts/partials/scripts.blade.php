<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<script src="https://unpkg.com/growl-alert"></script>
@if (Session::has('msg-flash'))
    <script>
      growl({
        type: '{!! session('msg-flash')['type'] !!}',
        text: '{!! session('msg-flash')['text'] !!}',
        fadeAway: true,
        fadeAwayTimeout: 5000,
      });
    </script>
@endif

@stack('scripts')