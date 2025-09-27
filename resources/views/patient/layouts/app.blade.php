<!DOCTYPE html>
<html lang="en">
@include('patient.layouts.header')
<body>
  <div class="container-fluid">
    <div class="row min-vh-100">
      @include('patient.layouts.sidebar') 
      
      <div class="col-md-9 col-lg-10 p-4">
        @yield('content')
      </div>
    </div>
  </div>

@include('patient.layouts.footer')
</body>
</html>
