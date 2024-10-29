
<?php require base_path("views/partials/header.php") ?>

      <div class="min-h-full">

        <?php require base_path("views/partials/nav.php") ?>
        <?php require base_path("views/partials/banner.php")?>

        <main>
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul class="list-disc">
              <p class="text-zinc-950">
                  <?= $post['body'] ?>
              </p>
            </ul>
          </div>
        </main>

      </div>
<?php require base_path("views/partials/footer.php") ?>

