function markNotificationAsRead(notificationCount) {
    if(notificationCount !=='0'){
        $.get('/admin/markAsRead');
    }
}

