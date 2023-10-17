 <!-- build:js assets/vendor/js/core.js -->
 <script src="{{asset('backEndAssets')}}/assets/vendor/libs/jquery/jquery.js"></script>
 <script src="{{asset('backEndAssets')}}/assets/vendor/libs/popper/popper.js"></script>
 <script src="{{asset('backEndAssets')}}/assets/vendor/js/bootstrap.js"></script>
 <script src="{{asset('backEndAssets')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

 <script src="{{asset('backEndAssets')}}/assets/vendor/js/menu.js"></script>
 <!-- endbuild -->

 <!-- Vendors JS -->
 <script src="{{asset('backEndAssets')}}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

 <!-- Main JS -->
 <script src="{{asset('backEndAssets')}}/assets/js/main.js"></script>

 <!-- Page JS -->
 <script src="{{asset('backEndAssets')}}/assets/js/dashboards-analytics.js"></script>

 <!-- Place this tag in your head or just before your close body tag. -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @if(Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
   @endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@stack('js')
 <script src="{{asset('backEndAssets')}}/assets/js/code.js"></script>
 <script src="{{asset('backEndAssets')}}/assets/js/handlebars.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"
 integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- select --}}
  <script src="{{asset('backEndAssets')}}/assets/select2/js/select2.min.js"></script>
  <script src="{{asset('backEndAssets')}}/assets/select2/form-advanced.init.js"></script>

</body>

 </html>


