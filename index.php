<?php require_once('functions.php'); ?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Paycheck Calculator</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="toggle-switch">
            <input type="checkbox" id="theme-toggle">
            <label for="theme-toggle" class="slider">
                <i class="fa fa-sun"></i>
                <i class="fa fa-moon"></i>
            </label>
        </div>

        <h1><i class="fa fa-calculator"></i> NY Gross to Net Calculator</h1>



        <form method="post" action="generate_paystub.php">
                <div class="input-group">
        <label for="employee_name"><i class="fa fa-user"></i> Employee Name:</label>
        <div class="input-group">
            <input type="text" name="employee_name" id="employee_name" class="form-control" required placeholder="Enter Employee Name">
        </div>
    </div>
            <div class="input-group">
                <label><i class="fa fa-money-bill"></i> Gross Income:</label>
                <input type="number" name="gross_income" required>
            </div>

            <div class="input-group">
                <label><i class="fa fa-calendar-alt"></i> Pay Frequency:</label>
                <select name="pay_frequency" required>
                    <option value="weekly">Weekly</option>
                    <option value="bi-weekly">Bi-Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>

            <div class="input-group">
                <label><i class="fa fa-user-clock"></i> Paid Type:</label>
                <select name="paid_type" required>
                    <option value="hourly">Hourly</option>
                    <option value="salary">Salary</option>
                </select>
            </div>

            <div class="input-group">
                <label><i class="fa fa-business-time"></i> Overtime Hours:</label>
                <input type="number" name="overtime_hours" value="0">
            </div>

            <div class="input-group">
                <label><i class="fa fa-users"></i> Filing Status:</label>
                <select name="filing_status" required>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                </select>
            </div>

            <div class="input-group">
                <label><i class="fa fa-child"></i> Number of Dependents:</label>
                <input type="number" name="dependents" required>
            </div>

            <div class="input-group">
                <label><i class="fa fa-hand-holding-usd"></i> Pre-Tax Deductions:</label>
                <input type="number" name="pre_tax_deductions">
            </div>

            <button type="submit"><i class="fa fa-file-invoice-dollar"></i> Generate Pay Stub</button>
        </form>
    </div>

    <script>
        const toggle = document.getElementById("theme-toggle");
        const htmlTag = document.documentElement;

        toggle.addEventListener("change", () => {
            htmlTag.setAttribute("data-theme", toggle.checked ? "dark" : "light");
        });
    </script>
</body>
</html>
