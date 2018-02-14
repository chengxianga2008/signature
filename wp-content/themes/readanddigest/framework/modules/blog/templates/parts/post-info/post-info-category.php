<div class="eltdf-post-info-category"><?php //the_category(', '); ?>
  <?php $parentscategory ="";
$category = get_the_category();
$parent = get_cat_name($category[0]->category_parent);
if (!empty($parent)) {
echo ' ' . $parent;
} else {
echo ' ' . $category[0]->cat_name;
} ?></div>