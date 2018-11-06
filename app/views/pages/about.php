<?php require APP_ROOT . "/views/inc/header.php"; ?>
<!-- Navigation -->
<?php require APP_ROOT . "/views/inc/navbar.php"; ?>

<!-- Page-banner -->
<header class="masthead" style="background-image: url('/img/slider/about-bg.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h4><?php echo $data['title']; ?></h4>
            <p><?php echo $data['description']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </header>

<main role="main" class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h3 class="pb-3 mb-4">
                <strong>About Us</strong>
            </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio velit corrupti quam unde impedit labore cumque officiis enim esse, facere exercitationem facilis rem explicabo necessitatibus dolores porro quae cupiditate minima error eaque atque iusto, eos tempore officia! Id, quis quia saepe cumque deleniti enim. At deleniti consectetur, alias tempore eius aut quasi corporis reprehenderit nesciunt? Et quis animi, ipsum ullam deleniti magni corrupti rem expedita ad inventore, ex facere illo alias vel officiis in beatae atque totam? Nobis rerum, porro aperiam amet quaerat eveniet molestiae saepe exercitationem quod vel totam expedita, minima quidem. Dicta repellat alias harum rerum reprehenderit excepturi?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel nihil rerum reiciendis laborum nesciunt tempore amet nisi molestiae nulla odit optio accusantium, error totam dolorum saepe dicta incidunt laudantium quam molestias autem. Perspiciatis consectetur aspernatur omnis dignissimos asperiores reiciendis similique amet quidem ipsa saepe fuga, ad delectus animi, soluta eveniet.</p>
        </div>
    </div><!-- /.row -->
</main><!-- /.container -->

<?php require APP_ROOT . "/views/inc/footer.php"; ?>