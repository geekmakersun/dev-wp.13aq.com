// 图片和视频弹出层功能（使用Bootstrap Modal）
(function () {
    "use strict";

    // 初始化图片弹出层
    const popupImages = document.querySelectorAll('.popup-image');
    popupImages.forEach(image => {
        image.addEventListener('click', function (e) {
            e.preventDefault();
            
            // 获取图片URL和标题
            const imageUrl = this.querySelector('img').src;
            const imageTitle = this.querySelector('img').alt || '';
            
            // 创建Modal结构
            const modalHtml = `
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">${imageTitle}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="${imageUrl}" class="img-fluid" alt="${imageTitle}">
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // 添加Modal到页面
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            
            // 显示Modal
            const modal = new bootstrap.Modal(document.getElementById('imageModal'));
            modal.show();
            
            // 模态关闭后移除Modal元素
            const modalElement = document.getElementById('imageModal');
            modalElement.addEventListener('hidden.bs.modal', function () {
                this.remove();
            });
        });
    });

    // 初始化视频弹出层
    const popupVideos = document.querySelectorAll('.popup-video');
    popupVideos.forEach(video => {
        video.addEventListener('click', function (e) {
            e.preventDefault();
            
            // 获取视频URL
            const videoUrl = this.getAttribute('href');
            
            // 创建Modal结构
            const modalHtml = `
                <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="videoModalLabel">视频播放</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="ratio ratio-16x9">
                                    <iframe src="${videoUrl}" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // 添加Modal到页面
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            
            // 显示Modal
            const modal = new bootstrap.Modal(document.getElementById('videoModal'));
            modal.show();
            
            // 模态关闭后移除Modal元素
            const modalElement = document.getElementById('videoModal');
            modalElement.addEventListener('hidden.bs.modal', function () {
                this.remove();
            });
        });
    });

})();