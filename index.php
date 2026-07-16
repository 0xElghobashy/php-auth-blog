<?php include_once 'header.php'; ?>
<section class="intro">
  <?php
  if (isset($_SESSION['userUid'])) {
    echo "<p>Hello " . $_SESSION['userUid'] . ".</p>";
  }
  ?>
  <h1>This is An Introduction</h1>
  <p>
    Here is an important paragraph that explains the purpose of the website and why you are here!
  </p>
</section>

<section class="categories-section">
  <h2>Some Basic Categories</h2>
  <div class="categories">
    <div class="box">Fun Stuff</div>
    <div class="box">Serious Stuff</div>
    <div class="box">Exciting Stuff</div>
    <div class="box">Boring Stuff</div>
  </div>
</section>
<?php include_once 'footer.php'; ?>