<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results | Trains</title>
    <link rel="stylesheet" href="train_results.css" type="text/css">
    <style>
        .modify_search_bar {
            padding: 20px;
            background-color: #f5f5f5;
        }

        .From_TO_Station {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .From_TO_Station .input_station {
            flex: 1;
            margin-right: 10px;
        }

        .From_TO_Station .input_station input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modify_search_btn {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .train {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .train h2 {
            margin: 0;
        }

        .train-info {
            display: flex;
            justify-content: space-between;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav__content">
          <div class="logo"><a href="#">TR Trains</a></div>
          <label for="check" class="checkbox">
            <i class="ri-menu-line"></i>
          </label>
          <input type="checkbox" name="check" id="check" />
          <ul style="display: flex; align-items: center; gap: 1rem; list-style: none; transition: left 0.3s;">
            <li><a href="index.html">Home</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="register.html">Register</a></li>
            <li><a href="my-account.html">My Account</a></li>
          </ul>
        </div>
    </nav>

    <!-- Modify Search Bar -->
    <div class="modify_search_bar">
        <form action="">
            <div class="From_TO_Station">
                <div class="input_station">
                    <input type="text" placeholder="From">
                </div>
                <div class="input_station">
                    <input type="text" placeholder="To">
                </div>
                <div class="input_station">
                    <input type="date" placeholder="DateOfJourney">
                </div>
                <button class="modify_search_btn">Modify Search</button>
            </div>
        </form>
    </div>

    <!-- Train Container -->
    <div id="train-container">
        <?php
        // Start session to access session variables
        session_start();

        // Check if the trainsData session variable is set
        if (isset($_SESSION["trainsData"])) {
            // Loop through each train data and display it
            foreach ($_SESSION["trainsData"] as $train) {
                echo '<div class="train">';
                echo '<h2>' . $train["trainName"] . '</h2>';
                echo '<div class="train-info">';
                echo '<p>Running Days: ' . $train["runningDays"] . '</p>';
                echo '<p>Start Time: ' . $train["startTime"] . '</p>';
                echo '<p>Destination Time: ' . $train["destinationTime"] . '</p>';
                echo '</div>';
                echo '<h3>Categories:</h3>';
                echo '<ul>';
                foreach ($train["categories"] as $category) {
                    echo '<li>' . $category["name"] . ': Seats Available - ' . $category["seatsAvailable"] . '</li>';
                }
                echo '</ul>';
                echo '</div>';
            }

            // Unset the session variable
            unset($_SESSION["trainsData"]);
        } else {
            echo "No train data available.";
        }
        ?>
    </div>

    <!-- JavaScript
    <script src="train_results.js"></script> -->
</body>
</html>
