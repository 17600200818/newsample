<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Sample App') - Laravel 入门教程</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @include('layouts._css')
  </head>
  <body>
    @include('shared.message')
    @include('layouts._header')

    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            @yield('content')
            @include('layouts._footer')
        </div>
    </div>
    @include('shared.message')
  </body>
</html>
