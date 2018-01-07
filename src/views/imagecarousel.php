<div id="<?= $id ?>">
<?php $n=1; foreach ($images as $image) { ?>
    <a href="#">
        <img src="<?= $image['src'] ?>" id="item-<?= $n++ ?>" width="<?= $img_width ?>" height="<?= $img_height ?>" />
    </a>
<?php } ?>
    <div class="prevButton"></div>
    <div class="nextButton"></div>
</div>
