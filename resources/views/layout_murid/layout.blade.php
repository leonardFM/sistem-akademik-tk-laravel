@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')

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

@include('layout.footer')