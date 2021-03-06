<html>
<head>
    <title>AI Catalog - Add Entry</title>
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
                <li><a href="{{URL::to('home')}}">Home</a></li>
                <li><a href="{{URL::to('entryform')}}" class="active">Add Entry</a></li>
                <li id="rightfloat"><a href="#logout">Logout</a></li>
                <li id="rightfloat"><a href="#login">Login</a></li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col">
            <h2>This page will probably be replaced by google forms</h2>
        </div>
    </div>
    <div class="row">

        <div id="form" class="col">
            <form>
                <div class="form-group">
                    <label for="placeholder">Placeholder</label>
                    <input type="text" class="form-control" id="placeholder" placeholder="placeholder">
                </div>
                <div class="form-group">
                    <label for="placeholder">Placeholder</label>
                    <input type="text" class="form-control" id="placeholder" placeholder="placeholder">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
