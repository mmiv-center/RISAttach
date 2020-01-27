<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/colorbrewer.css">
    <link rel="stylesheet" href="css/style.css?_=11111">
    
    <title>Attach</title>
  </head>
  <body>

    <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Attach non-image data to an existing study - as a new series. This application will attempt to interpret the data and create a useful DICOM representation as a report.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Hauke Bartsch</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong>Attach</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

    
    <div class="container-fluid">
      <div class="row-fluid" style="margin-top: 10px;">
	<form action="php/upload.php" method="post" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="project">Project</label>
	    <select class="form-control" id="project">

	    </select>
	  </div>
	  <div class="form-group">
    	    <label for="participant">Participant</label>
	    <select class="form-control" id="participant">

	    </select>
	  </div>
	  <div class="form-group">
    	    <label for="event">Event</label>
	    <select class="form-control" id="event">
	      <option value="">Unknown</option>
	      <option value="01">01</option>
	      <option value="02">02</option>
	      <option value="03">03</option>
	      <option value="04">04</option>
	      <option value="05">05</option>
	      <option value="06">06</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlFile1">Attach these files</label>
	    <input type="file" class="form-control-file" id="exampleFormControlFile1" multiple>
	  </div>
	  <div>
	    <button class="btn btn-primary">Attach to PACS</button>
	  </div>
	</form>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/moment-with-locales.min.js" type="text/javascript"></script>
    <script src="js/all.js?_=sdfsdf" type="text/javascript"></script>
  </body>
</html>
