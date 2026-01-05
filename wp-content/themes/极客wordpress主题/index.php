<?php
get_header();
?>

<!-- 英雄区域 -->
<section class="uk-section uk-section-large">
    <div class="uk-container uk-container-small">
        <div class="uk-text-center">
            <h1 class="uk-heading-hero uk-text-primary">极客文档</h1>
            <p class="uk-text-lead uk-margin-medium-top uk-margin-bottom">
                基于Markdown的现代化文档生成器
            </p>
            <div class="uk-flex uk-flex-center uk-margin-large">
                <a href="#" class="uk-button uk-button-primary uk-button-large">
                    快速上手
                    <span uk-icon="arrow-right"></span>
                </a>
                <a href="#" class="uk-button uk-button-default uk-button-large uk-margin-small-left">
                    <span uk-icon="github"></span>
                    GitHub
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 特性介绍 -->
<section id="features" class="uk-section">
    <div class="uk-container">
        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
            <div class="uk-text-center">
                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-shadow-small">
                    <div class="uk-margin-bottom" uk-icon="icon: file-text; ratio: 3;"></div>
                    <h3 class="uk-card-title uk-margin-top">简洁至上</h3>
                    <p class="uk-text-muted">以Markdown为中心的项目结构，以最少的配置帮助你专注于写作。</p>
                </div>
            </div>
            <div class="uk-text-center">
                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-shadow-small">
                    <div class="uk-margin-bottom" uk-icon="icon: bolt; ratio: 3;"></div>
                    <h3 class="uk-card-title uk-margin-top">高性能</h3>
                    <p class="uk-text-muted">为每个页面预渲染生成静态HTML，同时在页面加载时作为SPA运行。</p>
                </div>
            </div>
            <div class="uk-text-center">
                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-shadow-small">
                    <div class="uk-margin-bottom" uk-icon="icon: palette; ratio: 3;"></div>
                    <h3 class="uk-card-title uk-margin-top">主题系统</h3>
                    <p class="uk-text-muted">提供开箱即用的默认主题，也可以选择社区主题或创建自己的主题。</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 插件系统 -->
<section id="plugins" class="uk-section uk-section-muted">
    <div class="uk-container">
        <div class="uk-text-center uk-margin-bottom">
            <h2 class="uk-heading-medium">插件系统</h2>
            <p class="uk-text-lead uk-text-muted">灵活的插件API，为你的站点提供许多即插即用的功能</p>
        </div>
        <div class="uk-grid-match uk-child-width-1-4@m" uk-grid>
            <div>
                <div class="uk-card uk-card-hover uk-card-body">
                    <div class="uk-margin-bottom" uk-icon="icon: code; ratio: 2;"></div>
                    <h3 class="uk-card-title">代码高亮</h3>
                    <p>支持多种编程语言的代码高亮显示</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-hover uk-card-body">
                    <div class="uk-margin-bottom" uk-icon="icon: link; ratio: 2;"></div>
                    <h3 class="uk-card-title">自动链接</h3>
                    <p>自动识别并转换链接为可点击状态</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-hover uk-card-body">
                    <div class="uk-margin-bottom" uk-icon="icon: image; ratio: 2;"></div>
                    <h3 class="uk-card-title">图片处理</h3>
                    <p>支持图片缩放、裁剪和懒加载</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-hover uk-card-body">
                    <div class="uk-margin-bottom" uk-icon="icon: settings; ratio: 2;"></div>
                    <h3 class="uk-card-title">自定义配置</h3>
                    <p>丰富的配置选项，满足各种需求</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 主题展示 -->
<section id="themes" class="uk-section">
    <div class="uk-container">
        <div class="uk-text-center uk-margin-bottom">
            <h2 class="uk-heading-medium">主题系统</h2>
            <p class="uk-text-lead uk-text-muted">选择一个主题，开始你的文档之旅</p>
        </div>
        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-overflow-hidden">
                    <div class="uk-card-media-top">
                        <div class="uk-height-small uk-background-primary uk-flex uk-flex-center uk-flex-middle">
                            <span class="uk-text-white uk-text-large">默认主题</span>
                        </div>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">简洁默认</h3>
                        <p>开箱即用的简洁主题，适合各种文档</p>
                        <a href="#" class="uk-button uk-button-text">了解更多</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-overflow-hidden">
                    <div class="uk-card-media-top">
                        <div class="uk-height-small uk-background-secondary uk-flex uk-flex-center uk-flex-middle">
                            <span class="uk-text-white uk-text-large">暗黑主题</span>
                        </div>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">暗黑模式</h3>
                        <p>护眼的暗黑主题，适合夜间阅读</p>
                        <a href="#" class="uk-button uk-button-text">了解更多</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-overflow-hidden">
                    <div class="uk-card-media-top">
                        <div class="uk-height-small uk-background-muted uk-flex uk-flex-center uk-flex-middle">
                            <span class="uk-text-black uk-text-large">企业主题</span>
                        </div>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">企业风格</h3>
                        <p>专业的企业风格主题，提升品牌形象</p>
                        <a href="#" class="uk-button uk-button-text">了解更多</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 文档链接 -->
<section id="docs" class="uk-section uk-section-primary uk-light">
    <div class="uk-container">
        <div class="uk-text-center">
            <h2 class="uk-heading-medium">开始使用</h2>
            <p class="uk-text-lead uk-margin-medium-bottom">详细的文档，帮助你快速上手</p>
            <a href="#" class="uk-button uk-button-large uk-button-default uk-text-primary">
                <span uk-icon="file-text"></span>
                查看文档
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
?>