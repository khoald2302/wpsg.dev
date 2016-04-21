<?php 
         /* get categories */
        $taxo = 'category';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
        $zo_image_style = (!empty($atts['zo_image_style_blog'])) ? $atts['zo_image_style_blog'] : 'thumb';
        $atts['item_class'] .= (!empty($atts['zo_background_item'])) ? " ".$atts['zo_background_item'] : '';
        set_query_var('zo_image_style',$zo_image_style);

?>
<div class="zo-grid-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout']=='masonry'):?>
        <div class="zo-grid-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php echo esc_html__( 'All', 'creativ' ); ?></a></li>
               <?php
               $posts=$atts['posts'];
               $query=$posts->query;
               $taxs = array();
               if(isset($query['tax_query'])){
                   $tax_query=$query['tax_query'];
                   foreach($tax_query as $tax){
                       if(is_array($tax)){
                           $taxs[] = $tax['terms'];
                       }
                   }
               }
               foreach ($atts['categories'] as $category):
                   if(!empty($taxs)){
                       if(in_array($category,$taxs)){?>
                           <?php $term = get_term($category, $taxonomy); ?>
                           <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                                   <?php echo esc_attr($term->name); ?>
                               </a>
                           </li>
                       <?php }}else{
                       ?><?php $term = get_term($category, $taxonomy); ?>
                       <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                           <?php echo esc_attr($term->name); ?>
                       </a>
                       </li><?php
                   } endforeach; ?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row zo-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            set_query_var('zo_category_group',$groups)

            ?>
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
               <?php
                 
                 get_template_part( 'single-templates/blog/content', get_post_format() ); 
               ?>
            </div>
            <?php
        }
        ?>
    </div>
    
     <?php
     if($atts['zo_show_pagination'] == '1'){ ?>
        <div  id="zo_blog_paging">
         <?php zo_paging_nav($posts); ?>   
         </div>
      <?php } ?>
    <?php
    
    wp_reset_postdata();
    ?>
</div>