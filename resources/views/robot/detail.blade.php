@extends('layouts.app')

@section('content')

<div class="container">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4 text-primary">Maschinenenmensch
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="{{ asset('img/robot/rb01.jpg') }}" alt="">
    </div>

    <div class="col-md-4" style="background-color:lightblue">
      <p><strong>Source:</strong>Metropolis</p>
          	<p><strong>Year:</strong>1925</p>
            <p><strong>Author:</strong>Thea von Harbou</p>
            <p><strong>Description:</strong>Delicate but faceless, transparent figure made of crystal flesh with silver bones and its eyes filled with an expression of calm madness.</p>
            <p><strong>Purpose</strong>:To disobey Frederson</p>
            <p><strong>Motivation</strong>:Evil</p>
            <p><strong>Size</strong>:1.78metres</p>
            <p><strong>Shape</strong>:35kg</p>
            <p><strong>Awards</strong>:CMU Robot Hall of Fame 2004</p>
            <p align="center"><button type="button" class="btn btn-success">Save</button></p>
    </div>

  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  <h3 class="my-4 text-primary">Related Robots</h3>

  <div class="row">

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="card-img-top" width="200" height="150" src="{{ asset('img/robot/rb02.jpg') }}" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="card-img-top" width="200" height="150" src="{{ asset('img/robot/rb03.jpg') }}" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="card-img-top" width="200" height="150" src="{{ asset('img/robot/rb01.jpg') }}" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="card-img-top" width="200" height="150" src="{{ asset('img/robot/rb04.jpg') }}" alt="">
          </a>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection