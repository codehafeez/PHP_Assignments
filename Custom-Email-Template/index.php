<?php
// email_template_system.php

class EmailTemplateSystem {
    private $templates = [
        'subscription' => [
            'subject' => 'Subscription Confirmation',
            'body' => "Dear {employee_name},\n\nThank you for subscribing to our {title} service.\n\nBest regards,\n{office_location} Team"
        ],
        'approve_leave' => [
            'subject' => 'Leave Application Approved',
            'body' => "Dear {employee_name},\n\nYour leave application for {title} has been approved.\n\nOffice Location: {office_location}\n\nEnjoy your time off!"
        ],
        'rejected_leave' => [
            'subject' => 'Leave Application Rejected',
            'body' => "Dear {employee_name},\n\nWe regret to inform you that your leave application for {title} has been rejected due to operational requirements.\n\nOffice Location: {office_location}\n\nPlease contact HR for more details."
        ],
        'eid_holiday' => [
            'subject' => 'Eid Holiday Announcement',
            'body' => "Dear {employee_name},\n\nWe're pleased to announce the Eid holiday schedule for {title}.\n\nOffice Location: {office_location}\n\nWishing you and your family a blessed Eid!"
        ]
    ];

    public function getTemplateOptions() {
        return array_keys($this->templates);
    }

    public function generateEmail($templateType, $variables) {
        if (!array_key_exists($templateType, $this->templates)) {
            throw new Exception("Invalid template type selected.");
        }

        $template = $this->templates[$templateType];
        
        // Replace placeholders with actual values
        $subject = $this->replacePlaceholders($template['subject'], $variables);
        $body = $this->replacePlaceholders($template['body'], $variables);

        return [
            'subject' => $subject,
            'body' => $body
        ];
    }

    private function replacePlaceholders($text, $variables) {
        foreach ($variables as $key => $value) {
            $placeholder = '{' . $key . '}';
            $text = str_replace($placeholder, $value, $text);
        }
        return $text;
    }
}

// Example Usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $templateSystem = new EmailTemplateSystem();
        
        $templateType = $_POST['template_type'];
        $variables = [
            'employee_name' => $_POST['employee_name'],
            'title' => $_POST['title'],
            'office_location' => $_POST['office_location']
        ];

        $email = $templateSystem->generateEmail($templateType, $variables);
        
        // Here you would typically send the email using mail() or a library like PHPMailer
        // For this example, we'll just display it
        echo "<h2>Email Preview</h2>";
        echo "<p><strong>Subject:</strong> " . htmlspecialchars($email['subject']) . "</p>";
        echo "<pre>" . htmlspecialchars($email['body']) . "</pre>";
    } catch (Exception $e) {
        echo "<div style='color:red;'>Error: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template System</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], select { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background: #0066cc; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        .preview { background: #f5f5f5; padding: 15px; margin-top: 20px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Custom Email Template System</h1>
    
    <form method="POST">
        <div class="form-group">
            <label for="template_type">Email Template:</label>
            <select id="template_type" name="template_type" required>
                <option value="">-- Select Template --</option>
                <?php
                $templateSystem = new EmailTemplateSystem();
                foreach ($templateSystem->getTemplateOptions() as $option) {
                    $displayName = ucwords(str_replace('_', ' ', $option));
                    echo "<option value=\"$option\">$displayName</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="employee_name">Employee Name:</label>
            <input type="text" id="employee_name" name="employee_name" required>
        </div>
        
        <div class="form-group">
            <label for="title">Title/Subject:</label>
            <input type="text" id="title" name="title" required>
        </div>
        
        <div class="form-group">
            <label for="office_location">Office Location:</label>
            <input type="text" id="office_location" name="office_location" required>
        </div>
        
        <button type="submit">Generate Email</button>
    </form>
</body>
</html>