<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'php/head.php'; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <?php
        include 'php/navigation.php';

        if ($_SESSION['role'] != "Admin") {
            header('Location: index.php');
            exit;
        }
        ?>
        
        <header class="display-5">
            <?php
            include 'functions/user_func.php';

            echo "<h1 class='display-5'>Admin Dashboard</h1>";
            echo "<p class='lead'>Captains of Pawsome Adoptables</p>";
            ?>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
                            <a href="#user-lists" class="list-group-item list-group-item-action">Manage Users</a>
                            <a href="#post-lists" class="list-group-item list-group-item-action">Moderate reports</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title user-lists">Manage users</h2>
                                <form method="GET" action="#" style="margin-bottom: 20px;" class="no-confirm">
                                    <input type="text" name="search" placeholder="Search by name">
                                    <input type="submit" value="Search">
                                </form>
                                <?php
                                include 'functions/admin_func.php'; 
                                $searchTerm = isset($_GET['search']) ? $_GET['search'] : null;
                                $resultUsers = usersDashboard($errorMsg, $success, $searchTerm);
                                $countUsers = countUsers($errorMsg, $success);
                                if ($countUsers) {
                                    echo "<p>Total registered users: " . $countUsers . "</p>";
                                } else {
                                    echo "Failed to count users: " . $errorMsg;
                                }

                                if ($resultUsers) {
                                    echo "<ul style='list-style-type: none;'>";
                                    while ($row = $resultUsers->fetch_assoc()) {
                                        echo "<li id='user-" . $row['id'] . "' data-timeout='" . $row['is_timedout'] . "' style='margin-bottom: 10px; border: 1px solid #ccc; padding: 10px;'>";
                                        echo "<div class='user-summary'>User ID: " . $row['id'] . ", First name: " . $row['fname'] . ", Status: " . $row['is_timedout'] . "<img class='arrow' src='/images/arrow.png' alt='arrow'></div>";
                                        echo "<div class='user-details' style='display: none;'>";
                                        echo "<div>Email: ". $row['email']."</div>";
                                        echo "<div>Contact: ". $row['contact']."</div>";
                                        ?>
                                        <form method="POST" action="timeout.php">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="status" value="<?php echo $row['is_timedout']; ?>">
                                            <input type="submit" value="Toggle user status">
                                        </form>
                                        <?php
                                        echo "</div>";
                                        echo "</li>";
                                    }
                                    echo "</ul>";
                                } else {
                                    echo "Failed to fetch users: " . $errorMsg;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title post-lists">Moderate reports</h2>
                                <form method="GET" action="#" style="margin-bottom: 20px;" class="no-confirm">
                                    <input type="text" name="search-report" placeholder="Search by name">
                                    <input type="submit" value="Search">
                                </form>
                                <?php
                                $searchTerm2 = isset($_GET['search-report']) ? $_GET['search-report'] : null;
                                $resultReports = moderateReports($errorMsg, $success, $searchTerm2);
                                if ($resultReports) {
                                    echo "<ul style='list-style-type: none;'>";
                                    while ($row = $resultReports->fetch_assoc()) {
                                        echo "<li id='user-" . $row['id'] . "' data-status='" . $row['status'] . "' style='margin-bottom: 10px; border: 1px solid #ccc; padding: 10px;'>";
                                        echo "<div class='report-summary'>Report ID: " . $row['id'] . ", Name: " . $row['name'] . " Pet Type: ". $row['breed'] . "<img class='arrow' src='/images/arrow.png' alt='arrow'></div>";
                                        echo "<div class='report-details' style='display: none;'>";
                                        echo "<div>Contact: ". $row['contact']."</div>";
                                        echo "<div>Last seen location: ". $row['lastSeenLocation']."</div>";
                                        echo "<div>Last seen date: ". $row['lastSeenDateTime']."</div>";
                                        echo "<div>Additional info: ". $row['additionalInfo']."</div>";
                                        echo "<div><img class='fixed-img' src='tmp_uploads/". $row['image'] . "' alt='Pet Image'></div>";
                                        ?>
                                        <div class="form-container top-margin">
                                            <!-- PUSH --> 
                                            <form method="POST" action="push_report.php">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="lastSeenLocation" value="<?php echo $row['lastSeenLocation']; ?>">
                                                <input type="hidden" name="additionalInfo" value="<?php echo $row['additionalInfo']; ?>">
                                                <input type="submit" value="Push"> 
                                            </form>

                                            <!-- DELETE -->
                                            <form method="POST" action="delete_report.php">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="submit" value="Delete">
                                            </form>
                                        </div>
                            
                                        <?php          
                                        echo "<div class='status-bar' data-status='" . $row['status'] . "'></div>";           
                                        echo "</div>";
                                        echo "</li>";
                                    }
                                    echo "</ul>";
                                } else {
                                    echo "Failed to fetch reports: " . $errorMsg;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
            <!-- Confirm popup dialog box -->
            <div id="confirm-popup" style="
                display: none; position: fixed; width: 300px; height: 200px; 
                background: #EAEAEA; border: 1px solid black; z-index: 1000; 
                padding: 20px; box-sizing: border-box;">
                <p id="confirm-message"></p>
                <button id="confirm-yes">Yes</button>
                <button id="confirm-no">No</button>
            </div>
        </main>
        <script src="js/admin.js"></script>
    </body>
</html>