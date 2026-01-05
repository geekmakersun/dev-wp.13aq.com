<?php

/**
 * 页脚模板
 *
 * VuePress风格页脚
 *
 * @package 极客wordpress主题
 */
?>

</div><!-- #content -->

<!-- VuePress风格页脚 -->
<footer id="colophon" class="site-footer uk-section uk-section-secondary uk-light">
    <div class="uk-container">
        <div class="uk-grid-match uk-child-width-1-4@m" uk-grid>
            <div>
                <h3 class="uk-text-uppercase uk-text-small">极客文档</h3>
                <ul class="uk-list uk-list-divider uk-list-small uk-text-muted">
                    <li><a href="#" class="uk-link-text">关于我们</a></li>
                    <li><a href="https://github.com" class="uk-link-text" target="_blank">GitHub</a></li>
                    <li><a href="#" class="uk-link-text">贡献指南</a></li>
                    <li><a href="#" class="uk-link-text">更新日志</a></li>
                </ul>
            </div>
            <div>
                <h3 class="uk-text-uppercase uk-text-small">快速链接</h3>
                <ul class="uk-list uk-list-divider uk-list-small uk-text-muted">
                    <li><a href="#" class="uk-link-text">快速上手</a></li>
                    <li><a href="#" class="uk-link-text">配置指南</a></li>
                    <li><a href="#" class="uk-link-text">主题开发</a></li>
                    <li><a href="#" class="uk-link-text">插件开发</a></li>
                </ul>
            </div>
            <div>
                <h3 class="uk-text-uppercase uk-text-small">社区</h3>
                <ul class="uk-list uk-list-divider uk-list-small uk-text-muted">
                    <li><a href="#" class="uk-link-text">GitHub Discussions</a></li>
                    <li><a href="#" class="uk-link-text">Gitter</a></li>
                    <li><a href="#" class="uk-link-text">Twitter</a></li>
                    <li><a href="#" class="uk-link-text">Stack Overflow</a></li>
                </ul>
            </div>
            <div>
                <h3 class="uk-text-uppercase uk-text-small">支持</h3>
                <ul class="uk-list uk-list-divider uk-list-small uk-text-muted">
                    <li><a href="#" class="uk-link-text">报告问题</a></li>
                    <li><a href="#" class="uk-link-text">功能请求</a></li>
                    <li><a href="#" class="uk-link-text">安全漏洞</a></li>
                    <li><a href="#" class="uk-link-text">商业支持</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-divider-icon uk-margin-medium"></div>
        <div class="uk-text-center uk-text-small uk-text-muted">
            <p>&copy; 2026 <?php bloginfo('name'); ?>. 基于 UIKit 构建.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>