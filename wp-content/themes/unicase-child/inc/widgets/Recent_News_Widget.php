<?php

class Recent_News_Widget extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'recent-news-widget',
            'description' => 'Recent News Widget',
        );
        parent::__construct( 'Recent_News_Widget', 'Recent News Widget', $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        $recent_news = wp_get_recent_posts( array(
            'numberposts' => 5,
            'post_type' => 'post',
            'post_status' => 'publish',
        ) );

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        foreach ($recent_news as $new) { ?>
            <div id="new-<?php echo $new['ID'] ?>" class="recent-new-item">
                <a href="<?php echo get_permalink($new['ID']) ?>" class="new-image">
                    <img src="<?php echo get_the_post_thumbnail_url($new['ID'])?>">
                </a>
                <div class="new-short-content">
                    <a class="new-title" href="<?php echo get_permalink($new['ID']) ?>">
                        <?php echo $new['post_title'] ?>
                    </a>
                    <p class="new-post-date">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?php echo date('d/m/Y', strtotime($new['post_date'])) ?>
                    </p>
                </div>
            </div>
        <?php }

        wp_reset_query();

        ?> <a href="<?php echo get_home_url()?>/blog" class="view-all-news"><?php echo esc_html__( 'Xem Thêm', 'unicase' ) ?></a>

        <?php echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Recent News', 'unicase' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        return $instance;
    }
}