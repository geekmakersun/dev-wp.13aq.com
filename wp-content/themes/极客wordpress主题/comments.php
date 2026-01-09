<?php
/**
 * 评论模板
 *
 * 显示文章评论和评论表单
 *
 * @package 极客wordpress主题
 */

// 如果直接访问此文件，退出
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php esc_html_e( '这篇文章受密码保护。请输入密码查看评论。', 'geek-wp-theme' ); ?></p>
    <?php
    return;
endif;
?>

<?php if ( have_comments() ) : ?>
    <ul class="comment-list">
        <?php
        wp_list_comments( array(
            'style'       => 'ul',
            'short_ping'  => true,
            'avatar_size' => 64,
            'callback'    => 'geek_comment_callback',
        ) );
        ?>
    </ul><!-- .comment-list -->

    <?php
    // 如果评论被分页，显示分页导航
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php esc_html_e( '评论导航', 'geek-wp-theme' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; 旧评论', 'geek-wp-theme' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( esc_html__( '新评论 &rarr;', 'geek-wp-theme' ) ); ?></div>
        </nav>
    <?php endif; // 检查评论分页 ?>

    <?php
    // 如果评论已关闭且有评论，显示一条消息
    if ( ! comments_open() && get_comments_number() ) :
        ?>
        <p class="no-comments"><?php esc_html_e( '评论已关闭。', 'geek-wp-theme' ); ?></p>
    <?php endif; ?>

<?php endif; // have_comments() ?>

<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$comments_args = array(
    // 重新定义标题
    'title_reply' => __( '发表评论', 'geek-wp-theme' ),
    'title_reply_to' => __( '回复给 %s', 'geek-wp-theme' ),
    'cancel_reply_link' => __( '取消回复', 'geek-wp-theme' ),
    'label_submit' => __( '发布评论', 'geek-wp-theme' ),
    
    // 重新定义评论表单的格式
    'comment_field' => '<div class="col-12 form-group mb-4"><textarea placeholder="写下您的留言" class="form-control" rows="8" id="comment" name="comment"' . $aria_req . '></textarea></div>',
    
    // 重新定义表单字段的格式
    'fields' => apply_filters( 'comment_form_default_fields', array(
        
        'author' =>
        '<div class="col-md-6 form-group mb-4">
            <input type="text" placeholder="输入您的姓名*" class="form-control" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . '>
        </div>',
        
        'email' =>
        '<div class="col-md-6 form-group mb-4">
            <input type="email" placeholder="输入您的邮箱*" class="form-control" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . '>
        </div>',
        
        'url' =>
        '<div class="col-md-12 form-group mb-4 d-none">
            <input type="url" placeholder="网站地址" class="form-control" id="url" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '">
        </div>',
    ) ),
    
    // 重新定义表单的整体格式
    'comment_notes_before' => '<p class="form-text">您的邮箱地址不会被公开。必填项已用 * 标记</p>',
    'comment_notes_after' => '',
    'class_submit' => 'vs-btn style7',
    'format' => 'xhtml',
);

comment_form( $comments_args );
?>

<?php
/**
 * 自定义评论回调函数
 *
 * @param array $comment 评论对象
 * @param array $args 评论参数
 * @param int $depth 评论深度
 */
function geek_comment_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class( 'vs-comment-item' ); ?> id="comment-<?php comment_ID(); ?>">
        <div class="vs-post-comment">
            <div class="comment-avater">
                <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>
            <div class="comment-content">
                <h4 class="name h4"><?php echo get_comment_author_link(); ?></h4>
                <span class="commented-on"><i class="fal fa-calendar-alt"></i> <?php printf( esc_html__( '%1$s %2$s', 'geek-wp-theme' ), get_comment_date(), get_comment_time() ); ?></span>
                <p class="text"><?php comment_text(); ?></p>
                <div class="reply_and_edit">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => '<i class="fal fa-reply"></i>回复', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </div>
        </div>
        <?php if ( $comment->comment_parent ) : ?>
            <ul class="children">
                <?php geek_comment_callback( $comment, $args, $depth + 1 ); ?>
            </ul>
        <?php endif; ?>
    </li>
    <?php
}
?>