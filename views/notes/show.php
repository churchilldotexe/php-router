
<?php require base_path("views/partials/header.php") ?>

      <div class="min-h-full">

        <?php require base_path("views/partials/nav.php") ?>
        <?php require base_path("views/partials/banner.php")?>

        <main>
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
              <li class="text-zinc-950">
                  <?= $post['body'] ?>
              </li>
            </ul>

            <form method="POST" action="/note/destroy" class="mt-2 p-2 w-fit rounded hover:bg-red-100">
              <input type="hidden" name="_method" value="DELETE"/>
              <input type="hidden" name="id" value="<?=$post['id']; ?>"/>
              <button class="text-red-600">Delete</button>
            </form>
          </div>
        </main>

      </div>
<?php require base_path("views/partials/footer.php") ?>

