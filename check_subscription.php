<?php
    // Include your database connection file
    include 'config.php';
    include 'user/function.php';
    function sendReminderEmail($recipientEmail) {
        include 'config.php';

        require 'vendor/autoload.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();


        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'fitnessapp96@gmail.com';
        $mail->Password = 'xxesgxqubzucxyco'; 
        $mail->Port = 587 ;
        $mail->SMTPSecure = 'tls';

        // Email content
        $mail->setFrom('fitnessapp96@gmail.com', 'Fitness App Due Date Reminder');
        $mail->addAddress($recipientEmail);
        $mail->Subject = 'Membership Expiry Reminder';
        $mail->isHTML(true);
        $mail->Body = '
            <html>
            <head>
                <title>Membership Expiry Reminder</title>
            </head>
            <body>
                <p>Dear valued member,</p>
                <p>We hope this email finds you well.</p>
                <p>We would like to remind you that your membership with Brown House Fitness Academy is expiring soon. We greatly appreciate your continued support and participation in our fitness community.</p>
                <p>To ensure uninterrupted access to our facilities and services, we kindly request you to renew your membership at your earliest convenience.</p>
                <p>If you have any questions or need assistance with the renewal process, please don\'t hesitate to contact our customer service team. We\'re here to help!</p>
                <p>Thank you for choosing Brown House Fitness Academy. We look forward to serving you for another term!</p>
                <p>Best regards,</p>
                <p>The Brown House Fitness Academy Team</p>
            </body>
            </html>';

    

        $mail->SMTPAutoTLS = false;

        // Set SSL context options to disable certificate verification
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];

        // Enable SMTP debugging
        //$mail->SMTPDebug = 2; // Enable verbose debug output

        // Send email
        if ($mail->send()) {
            return true;
            //echo 'Message has been sent';
        } else {
            return false;
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    function updateAccountsToInactive() {
        global $conn;
    
        // Get the current date
        $currentDate = date('Y-m-d');
    
        // Query to find accounts with a past due date
        $query = "SELECT membership.membershipid, account.IdNum 
                  FROM membership
                  INNER JOIN account ON membership.membershipid = account.IdNum
                  WHERE membership.dueDate < :currentDate";
        
        $statement = $conn->prepare($query);
        $statement->bindParam(':currentDate', $currentDate);
        $statement->execute();
    
        // Array to store IDs of accounts with past due dates
        $pastDueIds = [];
    
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $pastDueIds[] = $row['IdNum'];
        }
    
        // Update accounts to inactive status
        if (!empty($pastDueIds)) {
            $sql = "UPDATE account SET `Status`='Inactive' WHERE IdNum = ?";
            $stmt = $conn->prepare($sql);
    
            foreach ($pastDueIds as $id) {
                $stmt->bindParam(1, $id);
                if ($stmt->execute()) {
                    echo "Account with ID {$id} updated to inactive status.<br>";
                } else {
                    echo "Error updating account with ID {$id}: " . $stmt->errorInfo()[2] . "<br>";
                }
            }
        } else {
            echo "No accounts found with a past due date.<br>";
        }
    
        // Close the database connection
        $conn = null;
    }

    
    // Get current date
    $currentDate = date('Y-m-d');

    // Get date 2 days from now
    $dueDate = date('Y-m-d', strtotime($currentDate . ' + 2 days'));

    // Check all accounts for approaching membership due dates
    $query = "SELECT membership.membershipid , account.username FROM membership
              INNER JOIN account ON membership.membershipid = account.IdNum
              WHERE dueDate = :dueDate";
    $statement = $conn->prepare($query);
    $statement->bindParam(':dueDate', $dueDate);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $userId = $row['membershipid'];
            $recipientEmail = $row['username'];
           
            

            // Check if reminder email has already been sent today for this user
            $query = "SELECT * FROM duedate_reminder WHERE user_id = :userId AND lastreminderdate = :currentDate";
            $reminderStatement = $conn->prepare($query);
            $reminderStatement->bindParam(':userId', $userId);
            $reminderStatement->bindParam(':currentDate', $currentDate);
            $reminderStatement->execute();

            if ($reminderStatement->rowCount() == 0) {
                // Reminder email not sent today for this user
                // Send reminder email
                $emailSent = sendReminderEmail($recipientEmail);

                if ($emailSent) {
                    echo "Reminder email sent successfully to {$recipientEmail}" . "\n\n";

                    // Insert or update last reminder date in duedate_reminder table
                    $query = "INSERT INTO duedate_reminder (user_id, lastreminderdate) VALUES (:userId, :currentDate)
                              ON DUPLICATE KEY UPDATE lastreminderdate = :currentDate";
                    $reminderUpdateStatement = $conn->prepare($query);
                    $reminderUpdateStatement->bindParam(':userId', $userId);
                    $reminderUpdateStatement->bindParam(':currentDate', $currentDate);
                    $reminderUpdateStatement->execute();

                    //Insert to notifcation table
                    $adminID = getAdminID();
                    $messageCategory = "User Expiring Subscription";
                    $messageContent = "A member is approaching their membership due date.";
                    $status = "Unread";
                    $noticationSQL = "INSERT INTO `notifications` (`IdNum`, `messageCategory`, `messageContent`, `status`, `notifDate`) VALUES (?,?, ?, ?, NOW())";
                    $notifcationStmt = $conn->prepare($noticationSQL);
                    $notifcationStmt->bindParam(1, $adminID);
                    $notifcationStmt->bindParam(2, $messageCategory);
                    $notifcationStmt->bindParam(3, $messageContent);
                    $notifcationStmt->bindParam(4, $status);
                    $notifcationStmt->execute();
                } else {
                    echo "Failed to send reminder email to {$recipientEmail}";
                }
            } else {
                echo "Reminder email already sent today for user ID {$userId}" . "\n\n";
            }
        }
    } else {
        echo "No accounts approaching membership due date";
    }

    updateAccountsToInactive();
?>
