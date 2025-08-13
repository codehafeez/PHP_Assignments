<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../includes/functions.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
        checkLogin();
        
        if (!isAdmin()) {
            flash('error', 'Access denied');
            redirect('tasks');
        }
    }

    public function index() {
        $currentUserId = current_user_id();
        $users = $this->userModel->getAllExcept($currentUserId);

        require_once __DIR__ . '/../views/users/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validate_csrf($_POST['csrf_token'])) {
                flash('error', 'Invalid CSRF token');
                redirect('users/add');
            }

            $name = sanitize($_POST['name']);
            $email = sanitize($_POST['email']);
            $password = $_POST['password'];
            $role = sanitize($_POST['role']);

            if (strlen($password) < 6) {
                flash('error', 'Password must be at least 6 characters');
                redirect('users/add');
            }

            if ($this->userModel->register($name, $email, $password, $role)) {
                flash('success', 'User created successfully');
                redirect('users');
            } else {
                flash('error', 'Failed to create user. Email may already exist.');
                redirect('users/add');
            }
        }

        require_once __DIR__ . '/../views/users/add.php';
    }

    public function edit($id) {
        $user = $this->userModel->getById($id);

        if (!$user) {
            flash('error', 'User not found');
            redirect('users');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validate_csrf($_POST['csrf_token'])) {
                flash('error', 'Invalid CSRF token');
                redirect("users/edit/$id");
            }

            $name = sanitize($_POST['name']);
            $email = sanitize($_POST['email']);
            $role = sanitize($_POST['role']);
            $password = $_POST['password'];

            if (!empty($password)) {
                if (strlen($password) < 6) {
                    flash('error', 'Password must be at least 6 characters');
                    redirect("users/edit/$id");
                }
                $this->userModel->changePassword($id, $password);
            }

            if ($this->userModel->updateProfile($id, $name, $email, $role)) {
                flash('success', 'User updated successfully');
                redirect('users');
            } else {
                flash('error', 'Failed to update user');
                redirect("users/edit/$id");
            }
        }

        require_once __DIR__ . '/../views/users/edit.php';
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && validate_csrf($_POST['csrf_token'])) {
            if ($this->userModel->delete($id)) {
                flash('success', 'User deleted successfully');
            } else {
                flash('error', 'Failed to delete user');
            }
        }

        redirect('users');
    }

    public function downloadTemplate() {
        try {
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set headers
            $sheet->setCellValue('A1', 'ID');
            $sheet->setCellValue('B1', 'Name');
            $sheet->setCellValue('C1', 'Email');
            $sheet->setCellValue('D1', 'Role');
            $sheet->setCellValue('E1', 'Created At');

            // Style the header
            $headerStyle = [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFDDDDDD']
                ]
            ];
            $sheet->getStyle('A1:E1')->applyFromArray($headerStyle);

            // Auto-size columns
            foreach (range('A', 'E') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            // Set headers for download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="users_import_template.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            error_log("Template download error: " . $e->getMessage());
            flash('error', 'Failed to generate template');
            redirect('users/import');
        }
    }    
    public function export() {
        try {
            // Create new Spreadsheet object
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set headers with styling
            $sheet->setCellValue('A1', 'ID');
            $sheet->setCellValue('B1', 'Name');
            $sheet->setCellValue('C1', 'Email');
            $sheet->setCellValue('D1', 'Role');
            $sheet->setCellValue('E1', 'Created At');
            
            // Style the header row
            $headerStyle = [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFDDDDDD']
                ]
            ];
            $sheet->getStyle('A1:E1')->applyFromArray($headerStyle);

            // Get users data
            $users = $this->userModel->getAllExcept(current_user_id());

            // Add data rows
            $row = 2;
            foreach ($users as $user) {
                $sheet->setCellValue('A' . $row, $user['id']);
                $sheet->setCellValue('B' . $row, $user['name']);
                $sheet->setCellValue('C' . $row, $user['email']);
                $sheet->setCellValue('D' . $row, $user['role']);
                $sheet->setCellValue('E' . $row, $user['created_at']);
                $row++;
            }

            // Auto-size columns for better display
            foreach (range('A', 'E') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            // Set headers for download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="users_export_' . date('Y-m-d') . '.xlsx"');
            header('Cache-Control: max-age=0');

            // Create Excel file and output
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            error_log("Export error: " . $e->getMessage());
            flash('error', 'Failed to export users');
            redirect('users');
        }
    }

    public function import() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../views/users/import.php';
            return;
        }

        try {
            if (!isset($_FILES['import_file'])) {
                throw new Exception('No file uploaded');
            }

            $file = $_FILES['import_file'];

            // Validate file
            if ($file['error'] !== UPLOAD_ERR_OK) {
                throw new Exception('File upload error: ' . $file['error']);
            }

            // Check file size (limit to 5MB)
            if ($file['size'] > 5242880) {
                throw new Exception('File size exceeds 5MB limit');
            }

            // Check file extension
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowedExtensions = ['xlsx', 'xls', 'csv'];
            if (!in_array($fileExt, $allowedExtensions)) {
                throw new Exception('Invalid file type. Allowed types: ' . implode(', ', $allowedExtensions));
            }

            // Load the spreadsheet
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file['tmp_name']);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Remove header row
            array_shift($rows);

            // Process each row
            $importedCount = 0;
            $skippedCount = 0;
            foreach ($rows as $row) {
                // Skip empty rows
                if (empty(array_filter($row))) {
                    $skippedCount++;
                    continue;
                }

                // Prepare user data
                $userData = [
                    'name' => $row[1] ?? '',
                    'email' => $row[2] ?? '',
                    'role' => $row[3] ?? 'user',
                    'created_at' => $row[4] ?? date('Y-m-d H:i:s')
                ];

                // Validate required fields
                if (empty($userData['name']) || empty($userData['email']) || !filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
                    $skippedCount++;
                    continue;
                }

                // Check if user exists
                if ($this->userModel->emailExists($userData['email'])) {
                    $skippedCount++;
                    continue;
                }

                // Generate a random password for new users
                $password = bin2hex(random_bytes(8));

                // Create user
                if ($this->userModel->register($userData['name'], $userData['email'], $password, $userData['role'])) {
                    $importedCount++;
                } else {
                    $skippedCount++;
                }
            }

            flash('success', "Import completed: $importedCount users added, $skippedCount rows skipped");
        } catch (Exception $e) {
            error_log("Import error: " . $e->getMessage());
            flash('error', 'Import failed: ' . $e->getMessage());
        }

        redirect('users');
    }

    public function exportPdf() {
        try {
            $users = $this->userModel->getAllExcept(current_user_id());
            $imagePath = 'https://avatars.githubusercontent.com/u/48838492?v=4';            
            $html = '<!DOCTYPE html>
            <html>
            <head>
                <style>
                    @font-face {
                        font-family: "Bebas Neue";
                        src: url("https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap");
                    }
                    @font-face {
                        font-family: "Josefin Sans";
                        src: url("https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap");
                    }
                    body { 
                        font-family: "Josefin Sans", sans-serif; 
                        font-weight: 400;
                        color: #333; 
                    }
                    .header-container {
                        display: flex;
                        align-items: center;
                        margin-bottom: 20px;
                        border-bottom: 2px solid #2c3e50;
                        padding-bottom: 15px;
                    }
                    .logo {
                        width: 80px;
                        height: 80px;
                        border-radius: 50%;
                        object-fit: cover;
                        margin-right: 20px;
                        border: 3px solid #2c3e50;
                    }
                    .title { 
                        font-family: "Bebas Neue", sans-serif;
                        color: #2c3e50; 
                        font-size: 28px;
                        letter-spacing: 1px;
                        margin-bottom: 5px;
                    }
                    .subtitle {
                        font-family: "Josefin Sans", sans-serif;
                        font-weight: 300;
                        color: #7f8c8d;
                        font-size: 14px;
                    }
                    table { 
                        width: 100%; 
                        border-collapse: collapse;
                        margin-top: 15px;
                        font-family: "Josefin Sans", sans-serif;
                    }
                    th { 
                        font-family: "Bebas Neue", sans-serif;
                        letter-spacing: 1px;
                        background-color: #2c3e50; 
                        color: white;
                        padding: 12px;
                        text-align: left;
                        font-size: 16px;
                    }
                    td { 
                        padding: 10px;
                        border-bottom: 1px solid #ecf0f1;
                    }
                    tr:nth-child(even) {
                        background-color: #f8f9fa;
                    }
                    .admin-badge {
                        font-family: "Bebas Neue", sans-serif;
                        background-color: #3498db;
                        color: white;
                        padding: 3px 12px;
                        border-radius: 12px;
                        font-size: 12px;
                        letter-spacing: 0.5px;
                    }
                    .user-badge {
                        font-family: "Bebas Neue", sans-serif;
                        background-color: #2ecc71;
                        color: white;
                        padding: 3px 12px;
                        border-radius: 12px;
                        font-size: 12px;
                        letter-spacing: 0.5px;
                    }
                    .footer {
                        margin-top: 30px;
                        border-top: 1px solid #ecf0f1;
                        padding-top: 10px;
                        text-align: center;
                        font-size: 12px;
                        color: #7f8c8d;
                    }
                    .signature {
                        margin-top: 30px;
                        text-align: right;
                        font-style: italic;
                        color: #2c3e50;
                    }
                    .watermark {
                        position: fixed;
                        opacity: 0.1;
                        font-size: 80px;
                        width: 100%;
                        text-align: center;
                        z-index: -1000;
                        transform: rotate(-45deg);
                        transform-origin: 50% 50%;
                        top: 50%;
                        left: 0;
                        color: #2c3e50;
                        font-weight: bold;
                        font-family: "Bebas Neue", sans-serif;
                    }
                </style>
            </head>
            <body>
                <div class="watermark">CONFIDENTIAL</div>
                
                <div class="header-container">
                    <div class="title">USERS MANAGEMENT REPORT</div>
                    <div class="subtitle">Generated on: '.date('F j, Y \a\t H:i:s').'</div>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>CREATED AT</th>
                        </tr>
                    </thead>
                    <tbody>';
            
            foreach($users as $user) {
                $roleClass = ($user['role'] === 'admin') ? 'admin-badge' : 'user-badge';
                $html .= '<tr>
                            <td>'.$user['id'].'</td>
                            <td><strong>'.$user['name'].'</strong></td>
                            <td>'.$user['email'].'</td>
                            <td><span class="'.$roleClass.'">'.strtoupper($user['role']).'</span></td>
                            <td>'.date('M j, Y', strtotime($user['created_at'])).'</td>
                        </tr>';
            }
            
            $html .= '</tbody>
                </table>
                
                <div class="footer">
                    © '.date('Y').' www.codehafeez.com. All rights reserved.
                </div>
                
                <div class="signature" style="display: flex; justify-content: space-between; align-items:right;">
                    <img src="'.$imagePath.'" class="logo" alt="Profile Image"><br/><br/>
                    Generated by: '.$_SESSION['name'].'<br>
                    '.date('F j, Y').'
                </div>
            </body>
            </html>';

            // Configure DomPDF
            $dompdf = new \Dompdf\Dompdf([
                'defaultFont' => 'Josefin Sans',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'isPhpEnabled' => true,
                'isFontSubsettingEnabled' => true
            ]);
            
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            
            // Output PDF
            $dompdf->stream('users_report_'.date('Y-m-d').'.pdf', [
                'Attachment' => true
            ]);
            exit;
        } catch (Exception $e) {
            error_log("PDF export error: ".$e->getMessage());
            flash('error', 'PDF generation failed: '.$e->getMessage());
            redirect('users');
        }
    }
}