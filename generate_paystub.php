<?php
require_once('vendor/autoload.php');
require_once('functions.php');

// Collect form data
$employeeName = htmlspecialchars($_POST['employee_name']);
$grossIncome = floatval($_POST['gross_income']);
$payFrequency = $_POST['pay_frequency'];
$paidType = $_POST['paid_type'];
$overtimeHours = floatval($_POST['overtime_hours']);
$filingStatus = $_POST['filing_status'];
$dependents = intval($_POST['dependents']);
$preTaxDeductions = floatval($_POST['pre_tax_deductions']);

// Calculate taxes and net pay
$federalTax = calculateFederalTax($grossIncome, $filingStatus);
$stateTax = calculateStateTax($grossIncome);
$socialSecurityTax = calculateSocialSecurityTax($grossIncome);
$medicareTax = calculateMedicareTax($grossIncome);
$netPay = calculateNetPay($grossIncome, $filingStatus, $preTaxDeductions, $overtimeHours, $paidType);
$totalEarnings = $grossIncome - $preTaxDeductions;
$totalTaxes = $federalTax + $stateTax + $socialSecurityTax + $medicareTax;

// Format currency values
$formattedGross = number_format($grossIncome, 2);
$formattedPreTax = number_format($preTaxDeductions, 2);
$formattedTotalEarnings = number_format($totalEarnings, 2);
$formattedFederal = number_format($federalTax, 2);
$formattedState = number_format($stateTax, 2);
$formattedSS = number_format($socialSecurityTax, 2);
$formattedMedicare = number_format($medicareTax, 2);
$formattedTotalTaxes = number_format($totalTaxes, 2);
$formattedNetPay = number_format($netPay, 2);

// Paycheck date
$paycheckDate = calculatePaycheckDate($payFrequency);

// Get current date and time
$currentDateTime = date("F j, Y, g:i a");

// Start PDF
$pdf = new \TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 11);

$html = <<<HTML
<style>
    .header {
        background-color: #003366;
        color: #fff;
        padding: 12px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 15px;
    }
    .box {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 12px;
        border-radius: 5px;
    }
    .box-title {
        font-weight: bold;
        font-size: 14px;
        background-color: #f5f5f5;
        padding: 6px;
        margin: -10px -10px 10px -10px;
        border-bottom: 1px solid #ccc;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 5px;
    }
    td, th {
        padding: 6px;
        border-bottom: 1px solid #eee;
    }
    .total {
        font-weight: bold;
        background-color: #f9f9f9;
    }
    .netpay {
        font-size: 15px;
        font-weight: bold;
        color: #007700;
        text-align: center;
    }
    .footer {
        font-size: 10px;
        text-align: center;
        margin-top: 20px;
        color: #888;
    }
</style>

<div class="header">Pay Stub</div>

<div class="box">
    <div class="box-title">Employee Information</div>
    <table>
        <tr><td><strong>Name:</strong></td><td>{$employeeName}</td></tr>
        <tr><td><strong>Paycheck Date:</strong></td><td>{$paycheckDate}</td></tr>
        <tr><td><strong>Pay Frequency:</strong></td><td>{$payFrequency}</td></tr>
        <tr><td><strong>Paid Type:</strong></td><td>{$paidType}</td></tr>
        <tr><td><strong>Overtime Hours:</strong></td><td>{$overtimeHours}</td></tr>
        <tr><td><strong>Dependents:</strong></td><td>{$dependents}</td></tr>
    </table>
</div>

<div class="box">
    <div class="box-title">Earnings</div>
    <table>
        <tr><td>Gross Income</td><td>\${$formattedGross}</td></tr>
        <tr><td>Pre-Tax Deductions</td><td>\${$formattedPreTax}</td></tr>
        <tr class="total"><td>Total Earnings</td><td>\${$formattedTotalEarnings}</td></tr>
    </table>
</div>

<div class="box">
    <div class="box-title">Taxes and Withholdings</div>
    <table>
        <tr><td>Federal Tax</td><td>\${$formattedFederal}</td></tr>
        <tr><td>State Tax (NY)</td><td>\${$formattedState}</td></tr>
        <tr><td>Social Security Tax</td><td>\${$formattedSS}</td></tr>
        <tr><td>Medicare Tax</td><td>\${$formattedMedicare}</td></tr>
        <tr class="total"><td>Total Taxes</td><td>\${$formattedTotalTaxes}</td></tr>
    </table>
</div>

<div class="box">
    <div class="box-title">Net Pay</div>
    <p class="netpay">\${$formattedNetPay}</p>
</div>

<div class="footer">
    Created by Sany<br>
    Created on: {$currentDateTime}
</div>
HTML;

// Generate PDF
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('pay_stub.pdf', 'D');
?>
