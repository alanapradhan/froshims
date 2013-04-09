<?

    // require common code
    require_once("includes/common.php"); 

    // log out current user (if any)
    session_start();
session_destroy();
redirect("http://www.hcs.harvard.edu/~froshims/blog/?page_id=182");
?>

