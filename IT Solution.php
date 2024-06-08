<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medco Care - IT Solutions</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h1>IT Solutions</h1>
        <?php
            // Array of IT solutions with their descriptions
            $it_solutions = array(
                array(
                    "name" => "Network Infrastructure",
                    "description" => "Our network infrastructure solutions ensure reliable and secure connectivity for your organization."
                ),
                array(
                    "name" => "Data Security",
                    "description" => "We provide robust data security solutions to protect your sensitive information from cyber threats."
                ),
                array(
                    "name" => "Cloud Services",
                    "description" => "Explore our cloud services for scalable and flexible IT infrastructure tailored to your needs."
                )
            );

            // Loop through the solutions array to display each solution
            foreach ($it_solutions as $solution) {
                echo "<div class='solution'>";
                echo "<h2>" . $solution['name'] . "</h2>";
                echo "<p>" . $solution['description'] . "</p>";
                echo "</div>";
            }
        ?>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>