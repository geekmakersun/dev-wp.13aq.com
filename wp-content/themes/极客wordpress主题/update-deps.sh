#!/bin/bash

# 主题依赖管理脚本
# 用于下载和更新第三方依赖

echo "开始更新主题依赖..."

# 创建vendor目录结构
echo "创建目录结构..."
mkdir -p assets/vendor/jquery assets/vendor/bootstrap/css assets/vendor/bootstrap/js

# 下载jQuery
echo "下载jQuery..."
if curl -o assets/vendor/jquery/jquery.min.js https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js; then
    echo "✓ jQuery 下载成功！"
else
    echo "✗ jQuery 下载失败，请检查网络连接或手动下载。"
fi

# 下载Bootstrap CSS
echo "下载Bootstrap CSS..."
if curl -o assets/vendor/bootstrap/css/bootstrap.min.css https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css; then
    echo "✓ Bootstrap CSS 下载成功！"
else
    echo "✗ Bootstrap CSS 下载失败，请检查网络连接或手动下载。"
fi

# 下载Bootstrap JS
echo "下载Bootstrap JS..."
if curl -o assets/vendor/bootstrap/js/bootstrap.bundle.min.js https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js; then
    echo "✓ Bootstrap JS 下载成功！"
else
    echo "✗ Bootstrap JS 下载失败，请检查网络连接或手动下载。"
fi


echo "依赖更新完成！"