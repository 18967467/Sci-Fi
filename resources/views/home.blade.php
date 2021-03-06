@extends('layouts.app')

@section('content')
<style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
  
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Filter</h4>
      <label>Name</label>
      <input type="text" class="form-control" placeholder="Name">
      <label>Year</label>
      <input type="text" class="form-control" placeholder="Year">
      <label>Author</label>
      <input type="text" class="form-control" placeholder="Author">
      <label>Action</label><br/>
      <input type="checkbox"> Activate</input><br/>
      <input type="checkbox"> Move</input><br/>
      <input type="checkbox"> Deactive</input><br/>
    </div>

<div class="col-sm-9">

<!-- Page Content -->
<div class="container">


  <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="{{ route('detail') }}"><img class="card-img-top" width="150" height="200" src="{{ asset('img/robot/rb01.jpg') }}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title" align="center">
            <a href="#">Maschinenenmensch</a>
          </h5>
          	<p><strong>Source:</strong>Metropolis</p>
          	<p><strong>Year:</strong>1925</p>
            <p><strong>Author:</strong>Thea von Harbou</p>
            <p><strong>Description:</strong>Delicate but faceless, transparent figure made of crystal flesh with silver bones and its eyes filled with an expression of calm madness.</p>
            <p><strong>Purpose</strong>:To disobey Frederson</p>
            <p><strong>Motivation</strong>:Evil</p>
            <p><strong>Size</strong>:1.78metres</p>
            <p><strong>Shape</strong>:35kg</p>
            <p><strong>Awards</strong>:CMU Robot Hall of Fame 2004</p>
          </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" width="150" height="200" src="{{ asset('img/robot/rb02.jpg') }}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title" align="center">
            <a href="#">R2-D2</a>
          </h5>
            <p><strong>Source:</strong>Star Wars</p>
            <p><strong>Year:</strong>1977</p>
            <p><strong>Author:</strong>George Lucas</p>
            <p><strong>Description:</strong>Some features that R2D2 has consists of Buzz saw, electric pike, drinks tray, fusion welder, data probe, power recharge coupler, rocket booster, holoprojector, motorized all-terrain treads and retractable third leg.</p>
            <p><strong>Purpose</strong>:To serve the Republic, Rebels and Resistance</p>
            <p><strong>Motivation</strong>:Good</p>
            <p><strong>Size</strong>:1.09metres</p>
            <p><strong>Shape</strong>:32kg</p>
            <p><strong>Awards</strong>:CMU Robot Hall of Fame 2003</p>
          </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" width="150" height="200" src="{{ asset('img/robot/rb03.jpg') }}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title" align="center">
            <a href="#">Robbie the Robot</a>
          </h5>
            <p><strong>Source:</strong>Forbidden Planet</p>
            <p><strong>Year:</strong>1956</p>
            <p><strong>Author:</strong>Fred M. Wilcox</p>
            <p><strong>Description:</strong>Bulky torso, antennaes</p>
            <p><strong>Purpose</strong>:To destroy all humans</p>
            <p><strong>Motivation</strong>:Evil</p>
            <p><strong>Size</strong>:1.31metres</p>
            <p><strong>Shape</strong>:50kg</p>
            <p><strong>Awards</strong>:CMU Robot Hall of Fame 2004</p>
          </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" width="150" height="200" src="{{ asset('img/robot/rb04.jpg') }}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title" align="center">
            <a href="#">Sentiental</a>
          </h5>
            <p><strong>Source:</strong>X-Men</p>
            <p><strong>Year:</strong>1965</p>
            <p><strong>Author:</strong>Stan Lee</p>
            <p><strong>Description:</strong>They are armed,capable of flight and can detect mutants at long range.</p>
            <p><strong>Purpose</strong>:To hunt mutants</p>
            <p><strong>Motivation</strong>:Evil</p>
            <p><strong>Size</strong>:6.1metres</p>
            <p><strong>Shape</strong>:Unknown</p>
            <p><strong>Awards</strong>:None</p>
          </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" width="150" height="200" src="{{ asset('img/robot/rb05.jpg') }}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title" align="center">
            <a href="#">Maschinenenmensch</a>
          </h5>
          	<p><strong>Source:</strong>Metropolis</p>
          	<p><strong>Year:</strong>1925</p>
            <p><strong>Author:</strong>Thea von Harbou</p>
            <p><strong>Description:</strong>Delicate but faceless, transparent figure made of crystal flesh with silver bones and its eyes filled with an expression of calm madness.</p>
            <p><strong>Purpose</strong>:To disobey Frederson</p>
            <p><strong>Motivation</strong>:Evil</p>
            <p><strong>Size</strong>:1.78metres</p>
            <p><strong>Shape</strong>:35kg</p>
            <p><strong>Awards</strong>:CMU Robot Hall of Fame 2004</p>
          </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" width="150" height="200" src="{{ asset('img/robot/rb06.jpg') }}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title" align="center">
            <a href="#">Maschinenenmensch</a>
          </h5>
          	<p><strong>Source:</strong>Metropolis</p>
          	<p><strong>Year:</strong>1925</p>
            <p><strong>Author:</strong>Thea von Harbou</p>
            <p><strong>Description:</strong>Delicate but faceless, transparent figure made of crystal flesh with silver bones and its eyes filled with an expression of calm madness.</p>
            <p><strong>Purpose</strong>:To disobey Frederson</p>
            <p><strong>Motivation</strong>:Evil</p>
            <p><strong>Size</strong>:1.78metres</p>
            <p><strong>Shape</strong>:35kg</p>
            <p><strong>Awards</strong>:CMU Robot Hall of Fame 2004</p>
          </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" width="150" height="200" src="{{ asset('img/robot/rb07.jpg') }}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title" align="center">
            <a href="#">Maschinenenmensch</a>
          </h5>
          	<p><strong>Source:</strong>Metropolis</p>
          	<p><strong>Year:</strong>1925</p>
            <p><strong>Author:</strong>Thea von Harbou</p>
            <p><strong>Description:</strong>Delicate but faceless, transparent figure made of crystal flesh with silver bones and its eyes filled with an expression of calm madness.</p>
            <p><strong>Purpose</strong>:To disobey Frederson</p>
            <p><strong>Motivation</strong>:Evil</p>
            <p><strong>Size</strong>:1.78metres</p>
            <p><strong>Shape</strong>:35kg</p>
            <p><strong>Awards</strong>:CMU Robot Hall of Fame 2004</p>
          </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" width="150" height="200" src="{{ asset('img/robot/rb08.jpg') }}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title" align="center">
            <a href="#">Maschinenenmensch</a>
          </h5>
          	<p><strong>Source:</strong>Metropolis</p>
          	<p><strong>Year:</strong>1925</p>
            <p><strong>Author:</strong>Thea von Harbou</p>
            <p><strong>Description:</strong>Delicate but faceless, transparent figure made of crystal flesh with silver bones and its eyes filled with an expression of calm madness.</p>
            <p><strong>Purpose</strong>:To disobey Frederson</p>
            <p><strong>Motivation</strong>:Evil</p>
            <p><strong>Size</strong>:1.78metres</p>
            <p><strong>Shape</strong>:35kg</p>
            <p><strong>Awards</strong>:CMU Robot Hall of Fame 2004</p>
          </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

  <!-- Pagination -->
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
    </li>
  </ul>

</div>
</div>
</div>
<!-- /.container -->

      
      
      
    </div>
  </div>
</div>
@endsection
