<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<!-- Slimscroll -->
<script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/plugins/fastclick/fastclick.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('/socket.io/socket.io.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.1/react.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.1/JSXTransformer.js"></script>

@yield('pagescripts')