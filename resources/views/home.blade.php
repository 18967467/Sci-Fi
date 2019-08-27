<html>
<head>
    <title>AI Catalog - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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
        <nav>
            <ul>
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="{{URL::to('entryform')}}">Add Entry</a></li>
                <li id="rightfloat"><a href="#logout">Logout</a></li>
                <li id="rightfloat"><a href="#login">Login</a></li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div id="sidebar" class="col-sm-3 col-lg-2">
            <!--Sidebar-->
            <div class="row">
                <div class="col">
                    <h2>Filters</h2>
                </div>
            </div>
            <div id="filtercontainer" class="row">
                <div id="filters" class="row">
                    <div class="col">
                        <h3>Title</h3>
                    </div>
                </div>
                <div id="filters" class="row">
                    <div class="col">
                        <form action="#">
                            <input id="search" type="text" name="test">
                        </form>
                    </div>
                </div>
            </div>
            <div id="filtercontainer" class="row">
                <div id="filters" class="row">
                    <div class="col">
                        <h3>Purpose</h3>
                    </div>
                </div>
                <div id="filters" class="row">
                    <div class="col">
                        <ul>
                            <li>
                                <input type="checkbox" id="purpose-research">
                                <label for="purpose-research">Research</label>
                            </li>
                            <li>
                                <input type="checkbox" id="purpose-military">
                                <label for="purpose-military">Military</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
        <div id="table" class="col-sm-9 col-lg-10">
            <!--Table-->
            <table class="table">
                <thead>
                    <tr>
                        <th>Test</th>
                        <th>Test2</th>
                        <th>Test3</th>
                    </tr>
                </thead>
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
