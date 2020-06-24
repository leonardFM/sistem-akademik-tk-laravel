@include('layout_admin.header')
@include('layout_admin.navbar')
@include('layout_admin.sidebar')

<div class="content-wrapper">
  <div class="content-header">
      <div class="row mb-1">
        
      </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      
          @yield('content')
        
    </div>
  </section>
  
</div>

@include('layout_admin.footer')