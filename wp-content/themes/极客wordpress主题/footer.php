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
<footer id="colophon" class="site-footer bg-dark text-white py-12">
    <div class="container px-4">
        <div class="row g-4 g-md-8">
            <div class="col-12 col-md-3">
                <h3 class="text-uppercase text-sm fw-semibold mb-4">极客文档</h3>
                <ul class="list-unstyled">
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">关于我们</a></li>
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="https://github.com" class="text-primary text-decoration-none" target="_blank">GitHub</a></li>
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">贡献指南</a></li>
                    <li class="mb-2"><a href="#" class="text-primary text-decoration-none">更新日志</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3">
                <h3 class="text-uppercase text-sm fw-semibold mb-4">快速链接</h3>
                <ul class="list-unstyled">
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">快速上手</a></li>
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">配置指南</a></li>
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">主题开发</a></li>
                    <li class="mb-2"><a href="#" class="text-primary text-decoration-none">插件开发</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3">
                <h3 class="text-uppercase text-sm fw-semibold mb-4">社区</h3>
                <ul class="list-unstyled">
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">GitHub Discussions</a></li>
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">Gitter</a></li>
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">Twitter</a></li>
                    <li class="mb-2"><a href="#" class="text-primary text-decoration-none">Stack Overflow</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3">
                <h3 class="text-uppercase text-sm fw-semibold mb-4">支持</h3>
                <ul class="list-unstyled">
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">报告问题</a></li>
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">功能请求</a></li>
                    <li class="mb-2 pb-2 border-bottom border-secondary-subtle"><a href="#" class="text-primary text-decoration-none">安全漏洞</a></li>
                    <li class="mb-2"><a href="#" class="text-primary text-decoration-none">商业支持</a></li>
                </ul>
            </div>
        </div>
        <div class="border-top border-secondary-subtle my-8 position-relative">
            <div class="position-absolute top-50 start-50 translate-middle bg-dark px-4">
                <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
        <div class="text-center text-sm text-secondary">
            <p>&copy; 2026 <?php bloginfo('name'); ?>. 基于 Bootstrap 构建.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>