<?php include './assets/inc/meta.inc.php' ?>
<link rel="stylesheet" href="./assets/css/master.min.css">
<title>Everything is made of dot.</title>
</head>

<body>

<header>
    <a class="header-brand" href="/">
        <img class="header-brand-logo" src="./assets/src/logo.png" alt="Logo fellow">
        <div class="header-brand-title">
            <h1>Everything is made of dot.</h1>
            <span>French clothing brand</span>
        </div>
    </a>
    <a href="/login">
        <img class="icon" src="./assets/src/icon/user.svg" alt="account icon">
    </a>
</header>



<section class="drop-item lastDrop">
    <form class="" method="POST" action="{{ route('produit') }}">
        @csrf
        <input name="drop" hidden id="drop" value="{{$drop->id}}">
        <a :href="route('produit')" onclick="event.preventDefault(); this.closest('form').submit();">
            <h2>{{$drop->name}}</h2>
            <p>Discover the new tee shirt.</p>
        </a>
    </form>
    <span class="tag">New</span>

</section>
<section class="archive">
    <h2>Archive</h2>
    <p class="grey">Take a look of the last drop. All “Archive Drops” will be not restock. </p>
    <ol class="archive-list">
        <li class="drop-item archive-item">
            <a href="#">
                <h2>Drop .1</h2>
                <p>First open drop. Inspire by the “Drop .0”.</p>
            </a>
            <span class="tag">15.08.2021</span>
        </li>
        <li class="drop-item archive-item">
            <a href="#">
                <h2>Drop .1</h2>
                <p>First open drop. Inspire by the “Drop .0”.</p>
            </a>
            <span class="tag">15.08.2021</span>

        </li>
    </ol>
</section>
<form class="toggleColour" method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')"
                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{ __('Déconnexion') }}
    </x-dropdown-link>
</form>
<footer>
    <a class="social button white" href="#">Instagram</a>

    <p>All contents of this website are the property of Everything is made of dot. . No part of this site, including all text and images, may be reproduced in any form without the prior written consent of Everything is made of dot. </p>
    <p>Copyright © 2021. All Rights Reserved.</p>

    <nav>
        <ul class="link-list">
            <li class="link-item">
        <span>
          <a href="#">Credits</a>
        </span>
            </li>
            <li class="link-item">
        <span>
          <a href="#">Return Policy</a>
        </span>
            </li>
            <li class="link-item">
        <span>
          <a href="#">Shipping</a>
        </span>
            </li>
            <li class="link-item">
        <span>
          <a href="#">Legals</a>
        </span>
            </li>
        </ul>
    </nav>
</footer>
</body>

</html>
