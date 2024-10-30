
<?php require base_path('views/partials/header.php') ?>

      <div class="min-h-full">

        <?php require base_path('views/partials/nav.php') ?>
        <?php require base_path('views/partials/banner.php')?>

        <main>
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
              <li class="text-zinc-950">
                  <?= $post['body'] ?>
              </li>
            </ul>

            <a href='<?= "/note/edit?id={$post['id']}" ?>' class="rounded-md bg-gray-500 mt-2 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>

          </div>
        </main>

      </div>
<?php require base_path('views/partials/footer.php') ?>

