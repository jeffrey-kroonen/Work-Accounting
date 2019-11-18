<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/"><?= APPNAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item <?= ($pageconfig["navactive"] == "dashboard") ? "active" : "" ?>">
        <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?= ($pageconfig["navactive"] == "clients") ? "active" : "" ?>">
        <a class="nav-link" href="/clients">Klanten <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>