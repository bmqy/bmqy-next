<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "bmqynext_settings";
$options = isset($_REQUEST["options"]) ? $_REQUEST["options"] : "base";

/*if($page !== "bmqynext_settings"){
	wp_die( __( "Sorry, you are not allowed to access this page." ) );
}*/


/** 注册主题选项菜单 */
add_action( 'admin_menu', 'bmqynext_menu' );

/** 设置主题选项页信息 */
function bmqynext_menu() {
	add_theme_page(
		__( 'Bmqy-next Settings', 'bmqynext' ),
		__( 'Bmqy-next Settings', 'bmqynext' ),
		'manage_options',
		'bmqynext_settings',
		'bmqynext_settings'
	);
}

/** 主题选项函数 */
function bmqynext_settings() {
	//must check that the user has the required capability
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( "Sorry, you are not allowed to access this page." ) );
	}
	global $options;
	?>
    <div class="wrap">
		<h1 class='wp-heading-inline'><?php echo __( 'Bmqy-next Settings', 'bmqynext' )?>
            <span style="font-size: 14px;color: #999;"><?php echo wp_get_theme()->get('Version') ?></span>
        </h1>
		<hr class='wp-header-end'>
		<h2 class="screen-reader-text"><?php echo __( 'Bmqy-next Settings', 'bmqynext' )?></h2>
        <h2 class="nav-tab-wrapper wp-clearfix">
            <a href="<?php echo admin_url( 'themes.php?page=bmqynext_settings' ); ?>" class="nav-tab <?php if($options === 'base') echo " nav-tab-active"?>"><?php esc_html_e('Base Settings', 'bmqynext') ?></a>
            <a href="<?php echo esc_url( add_query_arg( array( 'options' => 'nav' ), admin_url( 'themes.php?page=bmqynext_settings' ) ) ); ?>" class="nav-tab <?php if($options === 'nav') echo " nav-tab-active"?>"><?php esc_html_e('Nav Settings', 'bmqynext') ?></a>
            <a href="<?php echo esc_url( add_query_arg( array( 'options' => 'author' ), admin_url( 'themes.php?page=bmqynext_settings' ) ) ); ?>" class="nav-tab <?php if($options === 'author') echo " nav-tab-active"?>"><?php esc_html_e('Author Settings', 'bmqynext') ?></a>
            <a href="<?php echo esc_url( add_query_arg( array( 'options' => 'shop' ), admin_url( 'themes.php?page=bmqynext_settings' ) ) ); ?>" class="nav-tab <?php if($options === 'shop') echo " nav-tab-active"?>"><?php esc_html_e('Shop Settings', 'bmqynext') ?></a>
            <a href="<?php echo esc_url( add_query_arg( array( 'options' => 'ad' ), admin_url( 'themes.php?page=bmqynext_settings' ) ) ); ?>" class="nav-tab <?php if($options === 'ad') echo " nav-tab-active"?>"><?php esc_html_e('AD Settings', 'bmqynext') ?></a>
            <a href="<?php echo esc_url( add_query_arg( array( 'options' => 'share' ), admin_url( 'themes.php?page=bmqynext_settings' ) ) ); ?>" class="nav-tab <?php if($options === 'share') echo " nav-tab-active"?>"><?php esc_html_e('Share Settings', 'bmqynext') ?></a>
            <a href="<?php echo esc_url( add_query_arg( array( 'options' => 'pinglun' ), admin_url( 'themes.php?page=bmqynext_settings' ) ) ); ?>" class="nav-tab <?php if($options === 'pinglun') echo " nav-tab-active"?>"><?php esc_html_e('Comment Settings', 'bmqynext') ?></a>
            <a href="<?php echo esc_url( add_query_arg( array( 'options' => 'analytics' ), admin_url( 'themes.php?page=bmqynext_settings' ) ) ); ?>" class="nav-tab <?php if($options === 'analytics') echo " nav-tab-active"?>"><?php esc_html_e('Statistics and analysis', 'bmqynext') ?></a>
            <a href="<?php echo esc_url( add_query_arg( array( 'options' => 'other' ), admin_url( 'themes.php?page=bmqynext_settings' ) ) ); ?>" class="nav-tab <?php if($options === 'other') echo " nav-tab-active"?>"><?php esc_html_e('Other Settings', 'bmqynext') ?></a>
        </h2>
        <div id="bmqynextOptionsForm">
            <?php
            switch ($options){
                case 'base':
                    include_once('base.php');
                    break;
                case 'nav':
	                include_once('nav.php');
                    break;
                case 'author':
	                include_once('author.php');
                    break;
                case 'shop':
	                include_once( 'shop.php' );
                    break;
                case 'ad':
	                include_once('ad.php');
                    break;
                case 'share':
	                include_once('share.php');
                    break;
                case 'pinglun':
	                include_once( 'pinglun.php' );
                    break;
                case 'analytics':
	                include_once('analytics.php');
                    break;
                case 'other':
	                include_once('other.php');
                    break;
            }
            ?>
        </div>
    </div>
<?php }?>