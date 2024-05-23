<html>
    <head>
        <title>title</title>
        <meta charset="UTF-8">
        <title></title>    
        </head>
    <body>
        <?php 
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form data
        $hourlyWage = floatval($_POST["hourlyWage"]);
        $hoursWorked = floatval($_POST["hoursWorked"]);
        $taxRate = floatval($_POST["taxRate"]) / 100; // Convert percentage to decimal

        // Calculate gross pay
        $regularHours = min($hoursWorked, 40);
        $overtimeHours = max($hoursWorked - 40, 0);
        $overtimeRate = $hourlyWage * 1.5;

        $grossPay = ($regularHours * $hourlyWage) + ($overtimeHours * $overtimeRate);

        // Calculate taxes
        $taxesOwed = $grossPay * $taxRate;

        // Calculate net pay
        $netPay = $grossPay - $taxesOwed;

        // Display the results
        echo "<h2>Pay Summary</h2>";
echo "Gross Pay: $" . number_format($grossPay, 2) . "<br>";
echo "Taxes Owed: $" . number_format($taxesOwed, 2) . "<br>";
echo "Net Pay: $" . number_format($netPay, 2) . "<br>";
}
        ?>
    </body>
</html>
