<?php
session_start();
require_once '../includes/config.php';

$current_page = basename($_SERVER['PHP_SELF']);

$category_id = 4;
$stmt = $conn->prepare("SELECT * FROM exam_sets WHERE category_id = ?");
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>50 Câu Hỏi Điểm Liệt A2 - Thi Thử 2025</title>
    <link rel="stylesheet" href="../assets/css/page.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap">
    <link rel="icon" type="image/svg+xml" sizes="16x16" href="../assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include '../includes/header.php' ?>

    <div class="container main-content">
        <!-- Hero Section -->
        <div class="hero-section" style="background: var(--warning);">
            <h1 class="hero-title">50 Câu Hỏi Điểm Liệt A2</h1>
            <p class="hero-subtitle">Phải trả lời đúng 100% - Không được sai câu nào</p>

            <!-- Quick Stats -->
            <div class="quick-stats">
                <div class="stat-item">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>50 câu điểm liệt</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-clock"></i>
                    <span>25 phút</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Đúng 25/25</span>
                </div>
            </div>
        </div>

        <!-- Warning Box -->
        <div class="critical-warning">
            <div class="warning-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="warning-content">
                <h3>Lưu ý quan trọng</h3>
                <p>Trong kỳ thi thật, nếu sai bất kỳ câu điểm liệt nào sẽ bị <strong>KHÔNG ĐẠT</strong> ngay lập tức, dù
                    các câu khác đúng hết.</p>
            </div>
        </div>

        <!-- Main Exam Button -->
        <div class="exam-section">
            <h2 class="section-title">Bắt đầu ôn tập</h2>

            <?php
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '
                <a href="thi-thu-50-cau-diem-liet-a2.php?set_id=' . $row['set_id'] . '" class="exam-card-large">
                    <div class="exam-card-content">
                        <div class="exam-icon-large">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="exam-info-large">
                            <h3>Bộ Đề 50 Câu Điểm Liệt</h3>
                            <p>Làm quen với các câu hỏi quan trọng nhất</p>
                        </div>
                        <div class="exam-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>';
            }
            ?>

            <!-- Tips Section -->
            <div class="tips-grid">
                <div class="tip-card">
                    <i class="fas fa-lightbulb"></i>
                    <h4>Học thuộc lòng</h4>
                    <p>50 câu này phải nhớ 100%</p>
                </div>
                <div class="tip-card">
                    <i class="fas fa-repeat"></i>
                    <h4>Luyện tập nhiều lần</h4>
                    <p>Làm đi làm lại cho thuộc</p>
                </div>
                <div class="tip-card">
                    <i class="fas fa-brain"></i>
                    <h4>Hiểu bản chất</h4>
                    <p>Đừng chỉ học vẹt đáp án</p>
                </div>
            </div>
        </div>

        <!-- Navigation to Full Exams -->
        <div class="related-section">
            <h3>Sau khi thuộc 50 câu điểm liệt</h3>
            <div class="related-links">
                <a href="thi-bang-lai-xe-a2-online.php" class="related-card">
                    <i class="fas fa-arrow-right"></i>
                    <span>Tiếp tục với 18 đề thi A2 đầy đủ</span>
                </a>
            </div>
        </div>

        <!-- Collapsible Info Section -->
        <div class="info-section">
            <button class="info-toggle" onclick="toggleInfo()">
                <span>Địa chỉ đăng ký thi</span>
                <i class="fas fa-chevron-down"></i>
            </button>

            <div class="info-content" id="infoContent" style="display: none;">
                <div class="info-card">
                    <h3><i class="fas fa-map-marker-alt"></i> Thông tin thi tại Quy Nhơn</h3>
                    <p><strong>Đăng ký:</strong> 361 Tây Sơn, Quy Nhơn</p>
                    <p><strong>Thi:</strong> TT Đào tạo NVGTVT Bình Định, Nhơn Hội</p>
                    <a href="https://www.google.com/maps/place/Trung+T%C3%A2m+%C4%90%C3%A0o+T%E1%BA%A1o+V%C3%A0+S%C3%A1t+H%E1%BA%A1ch+L%C3%A1i+Xe+C%C6%A1+Gi%E1%BB%9Bi+B%C3%ACnh+%C4%90%E1%BB%8Jnh/@13.8270828,109.2606696,291m"
                        target="_blank" class="map-link">
                        <i class="fas fa-external-link-alt"></i> Xem bản đồ
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleInfo() {
            const content = document.getElementById('infoContent');
            const toggle = document.querySelector('.info-toggle i');

            if (content.style.display === 'none') {
                content.style.display = 'block';
                toggle.style.transform = 'rotate(180deg)';
            } else {
                content.style.display = 'none';
                toggle.style.transform = 'rotate(0deg)';
            }
        }
    </script>

    <?php include '../includes/footer.php'; ?>
</body>

</html>