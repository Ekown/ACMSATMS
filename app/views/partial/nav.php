<nav class="light-green lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo"><img class="responsive-img" src="/public/img/logoacm.png"></a>
      <ul class="right hide-on-med-and-down">
        <ul class="right hide-on-med-and-down">
        <li class=<?=App::get('home'); ?> ><a href="/">Home</a></li>
        <li class=<?=App::get('track'); ?> ><a href="/track">Track</a></li>
        <li class=<?=App::get('login'); ?> ><a href="/login">Login</a></li>
        <li class=<?=App::get('about'); ?> ><a href="/about">About</a></li>
        <li class=<?=App::get('contact'); ?> ><a href="/contact">Contact</a></li>
      </ul>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li class=<?=App::get('home'); ?> ><a href="/">Home</a></li>
        <li class=<?=App::get('track'); ?> ><a href="/track">Track</a></li>
        <li class=<?=App::get('login'); ?> ><a href="/login">Login</a></li>
        <li class=<?=App::get('about'); ?> ><a href="/about">About</a></li>
        <li class=<?=App::get('contact'); ?> ><a href="/contact">Contact</a></li>
        <li class=<?=App::get('home'); ?> ><a href="/">Go Back</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>