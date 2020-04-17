<?php
/**
 * Created by IntelliJ IDEA.
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
class bmqynext_custom_widget_test extends WP_Widget {
	/*
	 ** 声明一个数组$widget_ops，用来保存类名和描述，以便在主题控制面板正确显示小工具信息
	 ** $control_ops 是可选参数，用来定义小工具在控制面板显示的宽度和高度
	 ** 最后是关键的一步，调用WP_Widget来初始化我们的小工具
	 **/
	function __construct(){
		parent::__construct(
			false,
			'测试'
		);
		add_action( 'widgets_init', function() {
			register_widget( 'bmqynext_custom_widget_test' );
		});
/*		$widget_ops = array('classname'=>'bmqynext_custom_widget_test','description'=>'显示博主头像');
		$control_ops = array('width'=>250,'height'=>300);
		parent::__construct(false, '头像', $widget_ops, $control_ops);*/
	}
	public $args = array(
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget'  => '</div></div>'
	);

	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo '<div class="textwidget">';

		echo esc_html__( $instance['text'] );

		echo '</div>';

		echo $args['after_widget'];

	}

	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '' );
		$text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
		</p>
		<?php

	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';

		return $instance;
	}
}
$bmqynext_custom_widget_test = new bmqynext_custom_widget_test();