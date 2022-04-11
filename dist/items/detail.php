<?php
include("../parts/after-header.php");
require_once("../common/common.php");
?>

<main class='container my-10 mx-auto px-4 md:px-12 flex flex-wrap'>
  <article class='w-full lg:w-3/5'>
  </article>
  <div class='w-full lg:w-2/5'>
    <div class="overflow-x-auto">
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <tr>
            <th>商品名</th>
            <td>hogehogehogehogehogehgoe</td>
          </tr>
          <!-- row 2 -->
          <tr class="active">
            <th>金額</th>
            <td>25000</td>
          </tr>
          <!-- row 3 -->
          <tr>
            <th>ブランド</th>
            <td>Ralph Lauren</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include("../parts/after_footer.php"); ?>
