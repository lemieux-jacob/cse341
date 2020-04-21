<?php partial('header', ['title' => $title]); ?>

<!-- Content Goes Here  -->
<h2 class="title is-3">Introduction</h2>

<p>My name is Jacob Lemieux, and I am Canadian, currently pursuing a degree in Applied Technology at BYU-Idaho.</p>

<p>I wrote my first program when I was about 10 years old, a modified version of a game my brother had copied out of an old programming book, on an Apple 2 - in Basic A. I made my first website when I was 17 for a friend's business and I've been dabbling ever since.</p>

<p>I love technology, coding, and learning about new cool ways to use these things.</p>

<hr>

<h2 class="title is-3">Some of my Interests</h2>

<div id="interests" class="columns">
  <div class="column">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by3">
          <img src="assets/images/nintendo.jpg" alt="Nintendo">
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <h3 class="subtitle is-4">Video Games</h3>
          <p>I love all kinds of video games.</p>
          <p>Games that tell a story, I find challenging, or competitive games the most engaging.</p>
          <p>Some of my favorite games are Dark Souls, Prince of Persia, World of Warcraft, and League of Legends.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by3">
          <img src="assets/images/movie-theatre.jpg" alt="Movie Theatre">
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <h3 class="subtitle is-4">Movies</h3>
          <p>I like all kinds of Movies.</p>
          <p>My top 5 are:</p>
          <ul class="unlist">
            <li>Inception</li>
            <li>Batman Begins / The Dark Knight</li>
            <li>Iron Man</li>
            <li>The Princess Bride</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by3">
          <img src="assets/images/kayak.jpg" alt="Kayak">
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <h3 class="subtitle is-4">Outdoors</h3>
          <p>I like to be outside, camping, hiking, or if I can manage it, just being out on the water (Kayaking/Canoeing)</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php partial('footer'); ?>