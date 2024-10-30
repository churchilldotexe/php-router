
<?php require base_path('views/partials/header.php') ?>

      <div class="min-h-full">

        <?php require base_path('views/partials/nav.php') ?>
        <?php require base_path('views/partials/banner.php')?>

        <main>
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul class="list-disc">
            <?php foreach ($posts as $post) { ?>
              <li class="text-blue-500 hover:underline  ">
                <a href="<?= "/note?id={$post['id']}" ?>">
                  <?= $post['body'] ?>
                </a>
              </li>
            

            <?php } ?>
            </ul>
            <div class="mt-6">
              <a href="/note/create" class="p-2 rounded bg-blue-400">Create Post </a>
            </div>
          </div>
        </main>

      </div>
<?php require base_path('views/partials/footer.php') ?>

