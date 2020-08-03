<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * 归档页面
 *
 * @package custom
 */
$this->need('header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div id="main" class="col-12 clearfix" role="main">
            <article class="posti" itemscope itemtype="http://schema.org/BlogPosting">
                <!-- 总分类&标签 -->
                <h3>Something</h3>
                <div class="post-tags">
                    <!-- 分类 -->
                    <h4>Category</h4>
                    <?php $this->widget('Widget_Metas_Category_List', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($category); ?>
                    <ul class="category a_tag">
                        <li rel="tag">
                            <?php while ($category->next()) : ?>
                                <a href="<?php $category->permalink(); ?>"><?php $category->name(); ?></a>
                            <?php endwhile; ?>
                        </li>
                    </ul>
                    <!-- 标签 -->
                    <h4>Tag</h4>
                    <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
                    <ul class="tag a_tag">
                        <li rel="tag">
                            <?php while ($tags->next()) : ?>
                                <a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a>
                            <?php endwhile; ?>
                        </li>
                    </ul>
                </div>

                <h3>Post</h3>
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
                $year = 0;
                $mon = 0;
                $i = 0;
                $j = 0;
                $output = '<div id="archives">';
                while ($archives->next()) :
                    $year_tmp = date('Y', $archives->created);
                    $mon_tmp = date('m', $archives->created);
                    $y = $year;
                    $m = $mon;
                    if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
                    if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                    if ($year != $year_tmp) {
                        $year = $year_tmp;
                    }
                    if ($mon != $mon_tmp) {
                        $mon = $mon_tmp;
                        $output .= '<li class="mon"><span>' . $year . ' 年' . $mon . ' 月</span><ul class="day">';
                    }
                    $output .= '<a href="' . $archives->permalink . '">' . '<li>' . date('d日: ', $archives->created) . $archives->title . '</a> (' . $archives->commentsNum . ')</li>';
                endwhile;
                $output .= '</ul></li></ul></div>';
                echo $output;
                ?>
            </article>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>