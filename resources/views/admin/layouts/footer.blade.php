<!-- Essential javascripts for application to work-->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js')}}"></script>
{{-- @notifyJs <br> --}}
<script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{ URL::asset('assets/js/plugins/pace.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=cse2ahfsqcunvrw4qzljiq96mgiux7eo9cvgyjw24jk18n64"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify.js/2.0.0/notify.min.js"></script>
<script src="{{ asset('assets/js/ab-custom.js')}}"></script>
<script>
  window.Laravel = {
    'APP_URL': '{{ env("APP_URL") }}'
  };
</script>


@yield('footer_scripts')
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script>
  window.onload = function() {
      var elements = document.getElementsByClassName('myeditor');
      for (var i = 0; i < elements.length; i++) {
          CKEDITOR.replace(elements[i]);
      }
  };
</script>

</body>
</html>