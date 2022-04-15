<?php include("../parts/after-header.php") ?>
<div class="body-bag">
  <div class="shopping-cart">
    <!-- Title -->
    <div class="title">
      Shopping Bag
    </div>

    <!-- Item -->
    <div class="item">
      <div class="buttons">
        <span class="delete-btn"><i class="fas fa-trash-alt"></i></span>
        <span class="like-btn"><i class='far fa-heart'></i></span>
      </div>

      <div class="image">
        <img src="#" alt="" />
      </div>

      <div class="description">
        <span>Common Projects</span>
        <span>Bball High</span>
        <span>White</span>
      </div>

      <div class="quantity">
        <button class="plus-btn" type="button" name="button">
          <i class="fas fa-plus"></i>
        </button>
        <input type="text" name="name" value="1" max="1">
        <button class="minus-btn" type="button" name="button">
          <i class="fas fa-minus"></i>
        </button>
      </div>

      <div class="total-price">$549</div>
    </div>
  </div>
</div>
<?php include("../parts/after_footer.php") ?>
