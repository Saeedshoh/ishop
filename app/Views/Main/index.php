<div class="bnr" id="home">
    <div id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="images/bnr-1.jpg" alt="" />
            </li>
            <li>
                <img src="images/bnr-2.jpg" alt="" />
            </li>
            <li>
                <img src="images/bnr-3.jpg" alt="" />
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<div class="about">
    <div class="container">
        <?php if ($brands) : ?>
            <div class="about-top grid-1">
                <?php foreach ($brands as $brand) : ?>
                    <div class="col-md-4 about-left">
                        <figure class="effect-bubba">
                            <img class="img-responsive" src="images/<?= $brand->img ?>" alt="" />
                            <figcaption>
                                <h2><?= $brand->title ?></h2>
                                <p><?= $brand->description ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach ?>
                <div class="clearfix"></div>

            </div>
        <?php endif ?>
    </div>
</div>
<!--about-end-->
<!--product-starts-->
<?php if (isset($products) && !empty($products)) : ?>
    <div class="product">
        <div class="container">
            <div class="product-top">
                <div class="product-one">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-md-3 product-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="/product/<?= $product->alias ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $product->img ?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><a class="product-name" href="/product/<?= $product->alias ?>"> <?= $product->title ?></a></h3>
                                    <p>Explore Now</p>
                                    <h4>
                                        <a class="add-to-cart-link" href="cart/add?=id<?php $product->id ?>"><i></i></a> <span class=" item_price">$ <?= $product->price ?></span>
                                        <?php if ($product->old_price) : ?>
                                            <small><del><?= $product->old_price ?></del></small>
                                        <?php endif ?>
                                    </h4>
                                </div>
                                <?php if ($product->old_price) : ?>
                                    <?php
                                        $persent = round((($product->old_price - $product->price) * 100) / $product->old_price, 2);
                                    ?>
                                    <div class="srch">
                                        <span>-<?= $persent?>%</span>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>