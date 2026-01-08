<?php
get_header();
?>
<?php geek_render_carousel(); ?>

<!-- 英雄区域 -->
<section class="py-16 py-md-24">
    <div class="container px-4 mx-auto max-w-4xl">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-primary">极客文档</h1>
            <p class="lead mt-8 mb-4">
                基于Markdown的现代化文档生成器
            </p>
            <div class="d-flex justify-content-center gap-4 mt-12">
                <a href="#" class="btn btn-primary btn-lg d-flex align-items-center">
                    快速上手
                    <svg class="w-5 h-5 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
                <a href="#" class="btn btn-outline-secondary btn-lg d-flex align-items-center">
                    <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path>
                    </svg>
                    GitHub
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 特性介绍 -->
<section id="features" class="py-12">
    <div class="container px-4 mx-auto">
        <div class="row g-4 g-md-8">
            <div class="col-12 col-md-4">
                <div class="text-center">
                    <div class="card p-6 h-100">
                        <div class="mb-4 d-flex justify-content-center">
                            <svg class="w-16 h-16 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="h4 fw-semibold mt-2">简洁至上</h3>
                        <p class="text-muted">以Markdown为中心的项目结构，以最少的配置帮助你专注于写作。</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="text-center">
                    <div class="card p-6 h-100">
                        <div class="mb-4 d-flex justify-content-center">
                            <svg class="w-16 h-16 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="h4 fw-semibold mt-2">高性能</h3>
                        <p class="text-muted">为每个页面预渲染生成静态HTML，同时在页面加载时作为SPA运行。</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="text-center">
                    <div class="card p-6 h-100">
                        <div class="mb-4 d-flex justify-content-center">
                            <svg class="w-16 h-16 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </div>
                        <h3 class="h4 fw-semibold mt-2">主题系统</h3>
                        <p class="text-muted">提供开箱即用的默认主题，也可以选择社区主题或创建自己的主题。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
get_footer();
?>