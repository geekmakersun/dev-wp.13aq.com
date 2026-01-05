## 迁移计划

### 1. 删除 UIKit 依赖
- 删除目录：`/var/www/dev-wp.13aq.com/wp-content/themes/极客wordpress主题/assets/node_modules`

### 2. 安装并配置 Tailwind CSS V4
- 创建 `package.json` 文件
- 安装 Tailwind CSS V4 及依赖
- 配置 `tailwind.config.js`
- 创建 Tailwind CSS 入口文件
- 配置构建脚本

### 3. 修改 functions.php
- 移除所有 UIKit 相关的 CSS 和 JS 引用
- **保留 jQuery 引用**（根据需求，后期其他地方还需要）
- 添加 Tailwind CSS V4 的引用
- 更新主样式文件引用

### 4. 重构 header.php
使用 Tailwind CSS V4 重写整个 header 布局，包括：

#### 4.1 PC 导航栏
- 使用 Tailwind CSS 实现粘性定位
- 重写导航栏布局，包括 logo、导航菜单和右侧功能区
- 使用 Tailwind CSS 实现下拉菜单

#### 4.2 移动端导航栏
- 使用 Tailwind CSS 实现移动端导航栏
- 实现响应式设计，在移动端隐藏 PC 导航栏

#### 4.3 移动端侧边菜单
- 使用 Tailwind CSS 实现侧边菜单
- 实现菜单的展开/折叠功能

#### 4.4 搜索模态框
- 使用 Tailwind CSS 重写搜索模态框

### 5. 验证修改
- 检查页面是否正常加载
- 验证响应式设计是否正常工作
- 确保所有导航功能正常
- 确保搜索功能正常

## 预期结果
- 主题不再依赖 UIKit，但保留 jQuery
- 所有样式由 Tailwind CSS V4 提供
- Header 布局更加规范、现代
- 响应式设计正常工作
- 保持原有功能不变

## 技术要点
- 使用 Tailwind CSS V4
- 保留 jQuery 引用
- 采用移动优先的响应式设计
- 保持 WordPress 主题的最佳实践
- 确保代码结构清晰、易于维护