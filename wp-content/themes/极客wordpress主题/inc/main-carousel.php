<?php
/**
 * 主轮播图功能
 *
 * 处理主题的主轮播图相关功能
 *
 * @package 极客wordpress主题
 */

/**
 * 获取轮播图数据
 *
 * 从主题选项中获取轮播图图片和相关设置
 *
 * @return array 轮播图数据数组
 */
function geek_get_carousel_data() {
    // 获取主题选项中的轮播图数据
    $carousel_data = get_option('geek_carousel_data', array());
    
    // 如果没有轮播图数据，返回默认数据
    if (empty($carousel_data)) {
        return array(
            array(
                'image_url' => get_template_directory_uri() . '/assets/images/carousel-default-1.jpg',
                'title' => '欢迎使用极客文档',
                'description' => '基于Markdown的现代化文档生成器',
                'button_text' => '开始使用',
                'button_link' => '#'
            ),
            array(
                'image_url' => get_template_directory_uri() . '/assets/images/carousel-default-2.jpg',
                'title' => '简洁至上',
                'description' => '以Markdown为中心的项目结构，以最少的配置帮助你专注于写作',
                'button_text' => '了解更多',
                'button_link' => '#'
            )
        );
    }
    
    return $carousel_data;
}

/**
 * 渲染轮播图组件
 *
 * 使用Bootstrap的轮播组件渲染轮播图
 *
 * @return void
 */
function geek_render_carousel() {
    // 获取轮播图数据
    $carousel_items = geek_get_carousel_data();
    
    // 如果没有轮播图数据，不渲染
    if (empty($carousel_items)) {
        return;
    }
    
    ?>    
    <!-- 主轮播图 -->
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- 指示器 -->
        <div class="carousel-indicators">
            <?php foreach ($carousel_items as $index => $item) : ?>
                <button 
                    type="button" 
                    data-bs-target="#mainCarousel" 
                    data-bs-slide-to="<?php echo esc_attr($index); ?>" 
                    <?php echo $index === 0 ? 'class="active" aria-current="true"' : ''; ?>
                    aria-label="Slide <?php echo esc_attr($index + 1); ?>"
                ></button>
            <?php endforeach; ?>
        </div>
        
        <!-- 轮播内容 -->
        <div class="carousel-inner">
            <?php foreach ($carousel_items as $index => $item) : ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <img 
                        src="<?php echo esc_url($item['image_url']); ?>" 
                        class="d-block w-100" 
                        alt="<?php echo esc_attr($item['title']); ?>"
                        style="height: 500px; object-fit: cover;"
                    >
                    <div class="carousel-caption d-none d-md-block text-start">
                        <h3 class="display-5 fw-bold text-white mb-4"><?php echo esc_html($item['title']); ?></h3>
                        <p class="lead text-white mb-6"><?php echo esc_html($item['description']); ?></p>
                        <?php if (!empty($item['button_text']) && !empty($item['button_link'])) : ?>
                            <a 
                                href="<?php echo esc_url($item['button_link']); ?>" 
                                class="btn btn-primary btn-lg"
                            >
                                <?php echo esc_html($item['button_text']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- 控制按钮 -->
        <button 
            class="carousel-control-prev" 
            type="button" 
            data-bs-target="#mainCarousel" 
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">上一张</span>
        </button>
        <button 
            class="carousel-control-next" 
            type="button" 
            data-bs-target="#mainCarousel" 
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">下一张</span>
        </button>
    </div>
    <?php
}

/**
 * 初始化轮播图功能
 *
 * 注册轮播图相关的钩子和功能
 *
 * @return void
 */
function geek_carousel_init() {
    // 注册轮播图功能
    // 可以在这里添加更多初始化逻辑
}

// 初始化轮播图功能
add_action('init', 'geek_carousel_init');

