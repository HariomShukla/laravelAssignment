<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tops Infosolution</title>
    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-dark bg-dark">
                <div class="container">
                    <div class="navbar-header">
        
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/products') }}">
                            Product
                        </a>
                        <a class="navbar-brand" href="{{ url('category') }}">
                            Category
                        </a>
                        <a class="navbar-brand" href="{{ url('subcategory') }}">
                            Sub_Category
                        </a>
                        <a class="navbar-brand" href="{{ url('orders') }}">
                            Order
                        </a>
                        <a class="navbar-brand" href="{{ url('reports/link') }}">
                            Link_Product
                        </a>
                        <a class="navbar-brand" href="{{ url('reports/report') }}">
                            Report
                        </a>
                        <a class="navbar-brand" href="{{ url('reports/candidate') }}">
                            Candidates_Notes
                        </a>
                    </div>
        
                </div>
            </nav>
  <div class="container">
    @yield('main')
  </div>
  <!-- JavaScripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="{!! asset('js/main.js') !!}"></script>
</body>
</html>