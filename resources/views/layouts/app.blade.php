<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Visit Me</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    @yield('styles')
</head>

<body>
        <div id="wrap">
                <div class="container">
                  <div class="page-header">
                    <h1>Visit Generator</h1>
                  </div>
                  @yield('content')
              <div id="footer">
                <div class="container">
                  <p class="muted credit">
                    &copy; <?php echo date("Y"); ?> Andrew Wippler
                  </p>
                </div>
              </div>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    @yield('scripts')
</body>
</html>
