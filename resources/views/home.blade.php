<html>
<head>
    <title>AI Catalog</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
    <header class="row">
        <h1>AI Catalog</h1>
    </header>
    <div id="navbar" class="row">
        <!--Nav-->
        <nav class="navbar navbar-expand navbar-light bg-light">
            <a class="navbar-brand" href="#">Menu</a>
            <div class="navbar navbar-default" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Link 1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 3</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="row">
        <div id="sidebar" class="col-sm-3">
            <!--Sidebar-->
            <ul>
                <li>
                    <p>Test1</p>
                </li>
                <li>
                    <p>Test2</p>
                </li>
                <li>
                    <p>Test3</p>
                </li>
                <li>
                    <p>Test4</p>
                </li>
                <li>
                    <p>Test5</p>
                </li>
            </ul>
        </div>
        <div id="table" class="col-sm-9">
            <!--Table-->
            <table class="table">
                <thread>
                    <tr>
                        <th>Test</th>
                        <th>Test2</th>
                        <th>Test3</th>
                    </tr>
                </thread>
                <tbody>
                    <tr>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>
