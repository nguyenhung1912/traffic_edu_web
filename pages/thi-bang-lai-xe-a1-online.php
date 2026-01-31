<?php
session_start();
require_once '../includes/config.php';

$current_page = basename($_SERVER['PHP_SELF']);

$category_id = 1;
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
    <title>Thi Thử Bằng Lái Xe A1 Online 2025</title>
    <link rel="stylesheet" href="../assets/css/page.css">
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
        <div class="hero-section">
            <h1 class="hero-title">Thi Thử Bằng Lái Xe A1</h1>
            <p class="hero-subtitle">200 câu hỏi chuẩn - 8 đề thi - Miễn phí 100%</p>

            <!-- Quick Stats -->
            <div class="quick-stats">
                <div class="stat-item">
                    <i class="fas fa-file-alt"></i>
                    <span>25 câu/đề</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-clock"></i>
                    <span>19 phút</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Đạt 21/25</span>
                </div>
            </div>
        </div>

        <!-- Exam Grid -->
        <div class="exam-section">
            <h2 class="section-title">Chọn đề thi của bạn</h2>

            <!-- Đề Điểm Liệt -->
            <a href="thi-thu-20-cau-diem-liet-a1.php" class="exam-card special">
                <div class="exam-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="exam-info">
                    <h3>20 Câu Điểm Liệt</h3>
                    <p>Phải nắm vững trước khi thi</p>
                </div>
                <i class="fas fa-arrow-right"></i>
            </a>

            <!-- 8 Đề Thi -->
            <div class="exam-grid-modern">
                <?php
                $count = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($count <= 8) {
                            echo '
                            <a href="thi-thu-bang-lai-xe-may-a1.php?set_id=' . $row['set_id'] . '" class="exam-card">
                                <div class="exam-number">Đề ' . $count . '</div>
                                <div class="exam-details">
                                    <span><i class="fas fa-question-circle"></i> 25 câu</span>
                                </div>
                            </a>';
                            $count++;
                        } else {
                            break;
                        }
                    }
                }
                ?>
            </div>
        </div>

        <!-- Collapsible Info Section -->
        <div class="info-section">
            <button class="info-toggle" onclick="toggleInfo()">
                <span>Thông tin thêm</span>
                <i class="fas fa-chevron-down"></i>
            </button>

            <div class="info-content" id="infoContent" style="display: none;">
                <div class="info-grid">
                    <div class="info-card">
                        <h3><i class="fas fa-book"></i> Quy định</h3>
                        <ul>
                            <li>25 câu hỏi mỗi đề</li>
                            <li>Thời gian: 19 phút</li>
                            <li>Điểm đạt: 21/25 câu</li>
                            <li>Không sai câu điểm liệt</li>
                        </ul>
                    </div>

                    <div class="info-card">
                        <h3><i class="fas fa-map-marker-alt"></i> Địa chỉ thi</h3>
                        <p><strong>Đăng ký:</strong> 361 Tây Sơn, Quy Nhơn</p>
                        <p><strong>Thi:</strong> TT Đào tạo NVGTVT Bình Định, Nhơn Hội</p>
                        <a href="https://www.google.com/maps/place/Trung+T%C3%A2m+%C4%90%C3%A0o+T%E1%BA%A1o+V%C3%A0+S%C3%A1t+H%E1%BA%A1ch+L%C3%A1i+Xe+C%C6%A1+Gi%E1%BB%9Bi+B%C3%ACnh+%C4%90%E1%BB%8Bnh/@13.8270828,109.2606696,291m"
                            target="_blank" class="map-link">
                            <i class="fas fa-external-link-alt"></i> Xem bản đồ
                        </a>
                    </div>
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