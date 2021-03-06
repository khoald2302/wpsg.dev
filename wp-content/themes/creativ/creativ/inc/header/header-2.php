<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
?>
<?php global $smof_data, $zo_meta;
?>
<div id="collapse1" class="collapse myform">
    <div class="container-fluid">
        <?php get_search_form(); ?>
    </div>
</div>

<!--Header top-->
<?php if ($smof_data['enable_header_top'] == '1'): ?>
    <?php if ($zo_meta->_zo_header_top_enable == '1' || ($zo_meta->_zo_header == '')): ?>
        <div id="zo-header-top">
            <div class="container-fluid">
                <?php if (is_active_sidebar('sidebar-2')) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php dynamic_sidebar('sidebar-2'); ?></div>
                <?php endif; ?>
                <?php if (is_active_sidebar('sidebar-3')) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php dynamic_sidebar('sidebar-3'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<!--End Header top-->

<div id="zo-header" class="zo-main-header header-default zo-header-style-2 <?php
if (!$smof_data['menu_sticky']) {
    echo 'no-sticky';
}
?> <?php
if ($smof_data['menu_sticky_tablets']) {
    echo 'sticky-tablets';
}
?> <?php
if ($smof_data['menu_sticky_mobile']) {
    echo 'sticky-mobile';
}
?> <?php
if (!empty($zo_meta->_zo_enable_header_fixed)) {
    echo 'header-fixed-page';
}
?> <?php
if (!empty($zo_meta->_zo_enable_header_menu)) {
    echo 'header-menu-custom';
}
?>">
    <div class="container-fluid">

		<div id="zo-header-mobile" class="row">
            <div class="col-xs-12 col-sm-5 col-md-2 col-lg-2  logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="" src="<?php echo esc_url(zo_page_header_logo()); ?>"></a>
            </div>       
            <div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars fa-2x"></i></div>
        </div>
		
        <div id="zo-header-navigation" class="row">
            <div id="zo-header-navigation-1" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 zo-header-navigation">
                <nav id="left-navigation" class="main-navigation">
                    <?php
                    $attr = array(
                        'theme_location' => 'primary-left',
                        'menu' => zo_menu_location(),
                        'menu_class' => 'nav-menu menu-main-menu',
                    );
                    wp_nav_menu($attr);
                    ?>
                </nav>
            </div>
            <div id="zo-header-logo" class="col-md-2 col-lg-2  logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="" src="<?php echo esc_url(zo_page_header_logo()); ?>"></a>
            </div>
            <div id="zo-header-navigation-2" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 zo-header-navigation">
                <nav id="right-navigation" class="main-navigation">
                    <?php
                    $attr2 = array(
                        'theme_location' => 'primary-right',
                        'menu' => zo_menu_location(),
                        'menu_class' => ' nav-menu menu-main-menu',
                    );
                    wp_nav_menu($attr2);
                    ?>
                </nav>
            </div>   
        </div>
        <!-- #site-navigation -->
		
		<div class="menu-right">
			<span><a title="Search" href="#" id="filter-menu" class="nav-toggle collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false"><i class="fa fa-search"></i></a></span>
		</div>
    </div>
</div>