<?php
    // Get date from the DB
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
    $stmt->execute([$userId]);
    $raw = $stmt->fetch();
    $count = $stmt->rowCount();
    
    // render the page
    if ($count > 0) {
      include __DIR__ . '/../../includes/temps/members/editMember.php';
    } else {
      redirectTo("Bad Request", 'danger', "members.php?action=edit&userid=$userId");
    }