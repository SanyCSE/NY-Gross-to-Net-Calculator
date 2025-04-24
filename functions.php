<?php

// Function to calculate Federal Tax
function calculateFederalTax($grossIncome, $filingStatus) {
    // Example Federal Tax Bracket for simplicity
    $federalTaxRate = 0.10; // Just a basic rate, adjust based on the tax bracket
    return $grossIncome * $federalTaxRate;
}

// Function to calculate State Tax (New York)
function calculateStateTax($grossIncome) {
    // Example NY State Tax Rate (simplified)
    $stateTaxRate = 0.06; // Adjust according to actual NY tax brackets
    return $grossIncome * $stateTaxRate;
}

// Function to calculate Social Security Tax
function calculateSocialSecurityTax($grossIncome) {
    // 6.2% of gross income for Social Security tax up to a certain limit
    $socialSecurityRate = 0.062;
    return $grossIncome * $socialSecurityRate;
}

// Function to calculate Medicare Tax
function calculateMedicareTax($grossIncome) {
    // 1.45% of gross income for Medicare tax
    $medicareRate = 0.0145;
    return $grossIncome * $medicareRate;
}

// Function to calculate total taxes (sum of all taxes)
function calculateTotalTaxes($grossIncome, $filingStatus) {
    $federalTax = calculateFederalTax($grossIncome, $filingStatus);
    $stateTax = calculateStateTax($grossIncome);
    $socialSecurityTax = calculateSocialSecurityTax($grossIncome);
    $medicareTax = calculateMedicareTax($grossIncome);

    return $federalTax + $stateTax + $socialSecurityTax + $medicareTax;
}

// Function to calculate Net Pay
function calculateNetPay($grossIncome, $filingStatus, $preTaxDeductions, $overtimeHours, $paidType) {
    // Calculate overtime pay if Paid Type is hourly
    if ($paidType == 'hourly') {
        $hourlyRate = $grossIncome / 160; // Assuming 40 hours per week, 4 weeks per month
        $overtimePay = $overtimeHours * ($hourlyRate * 1.5); // Overtime is 1.5x regular hourly rate
        $grossIncome += $overtimePay; // Add overtime to the gross income
    }

    // Deduct pre-tax deductions from the gross income
    $grossIncomeAfterDeductions = $grossIncome - $preTaxDeductions;

    // Calculate total taxes
    $totalTaxes = calculateTotalTaxes($grossIncomeAfterDeductions, $filingStatus);

    // Calculate and return net pay
    $netPay = $grossIncomeAfterDeductions - $totalTaxes;

    return $netPay;
}

// Function to calculate paycheck date based on pay frequency
function calculatePaycheckDate($payFrequency) {
    $currentDate = date("Y-m-d");
    $paycheckDate = '';

    // Determine the next paycheck date based on pay frequency
    if ($payFrequency == 'weekly') {
        $paycheckDate = date('Y-m-d', strtotime("+1 week"));
    } elseif ($payFrequency == 'bi-weekly') {
        $paycheckDate = date('Y-m-d', strtotime("+2 weeks"));
    } elseif ($payFrequency == 'monthly') {
        $paycheckDate = date('Y-m-d', strtotime("+1 month"));
    }

    return $paycheckDate;
}
