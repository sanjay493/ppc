
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">RMDPPC</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Monthly Report
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="nav-link" href="final_mthly.php">Insert Monthly Data</a>
      <a class="nav-link" href="monthly_report.php">Monthly Report</a>
      <a class="nav-link" href="monthly_report_despatch_distribution.php">Despatch Distribution</a>
      </div> </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Report Entry
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="rake_add.php">Rake Loading Entry</a>
        <a class="dropdown-item" href="mines_custom_despatch.php">Update Rakes Backlog</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="mines_production.php">Mines Production Entry</a>
        <a class="dropdown-item" href="mines_custom_production.php">Mines Production Updates</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="flux.php"></a>
        <a class="dropdown-item" href="flux.php"></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="flux.php">Steel Plants Report Entry</a>
        <a class="dropdown-item" href="flux.php">Steel Plants Report Updates</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="test.php">Test</a>
    </li>
  </ul>
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
</nav>