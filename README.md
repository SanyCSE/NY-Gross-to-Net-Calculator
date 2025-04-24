#### Project Overview:
The **NY Gross to Net Calculator** is a web-based application designed to calculate an employee’s net pay based on their gross income, deductions, and applicable taxes in the state of New York. This project generates a detailed pay stub in PDF format, which includes important tax information, earnings, and deductions, and is customizable based on user input.

#### Key Features:
- **Employee Information Input**: Collects employee details like name, pay frequency, filing status, dependents, overtime hours, and pre-tax deductions.
- **Gross Income Calculation**: Allows users to input gross income, which is used in tax calculations.
- **Tax Calculations**: Calculates federal tax, state tax (NY), social security tax, and Medicare tax.
- **Earnings and Deductions**: Displays total earnings, pre-tax deductions, and other relevant figures.
- **Net Pay Calculation**: Computes the employee's net pay after taxes and deductions.
- **PDF Generation**: Creates a downloadable PDF pay stub that includes all the details of the calculation.
- **Employee Name Customization**: Allows the user to input their name, which is displayed on the generated pay stub.
- **Light and Dark Mode**: The application supports a light and dark mode theme for user preference.
- **Footer with Creator Info**: Includes a footer with the name "Created by Sany" and the date/time of the PDF generation.

---

### Technologies Used:
- **PHP**: Backend programming language used to collect form data, perform calculations, and generate PDFs.
- **TCPDF**: A PHP library used to generate PDF files from HTML content.
- **HTML/CSS**: Used for front-end design and user interface (UI), including form fields and page layout.
- **JavaScript (optional)**: Can be added for additional interactivity or functionality (e.g., theme toggling).

---

### System Requirements:
- **PHP** version 7.0 or above
- **TCPDF Library**: For generating PDF files.
- A local or remote server (e.g., XAMPP, WAMP, or a web hosting provider).
- **Internet Access**: For including external libraries and frameworks.

---

### Project Setup:

#### 1. Clone or Download the Project:
- Clone or download the repository containing the project files.

#### 2. Install Dependencies:
- The project uses **TCPDF**, which can be installed via Composer. Run the following command:
  
  ```bash
  composer require tecnickcom/tcpdf
  ```

#### 3. Setup Local Environment:
- Ensure that your local development environment (e.g., XAMPP or WAMP) is running PHP version 7.0 or higher.
- Place the downloaded files in the root directory of your local server (e.g., `htdocs` in XAMPP).
  
#### 4. File Structure:
```plaintext
/ny
  ├── index.php              # Main form for input
  ├── generate_paystub.php   # PHP script for processing and PDF generation
  ├── functions.php          # Helper functions for tax and pay calculations
  ├── vendor/                # Directory for Composer libraries (TCPDF)
  ├── css/                   # Folder for external CSS files
  └── images/                # Folder for any images (e.g., logos, icons)
```

---

### Features and Functionality:

#### 1. **User Input Form (`index.php`)**:
- The main page allows employees to input their personal details and income-related data.
- **Fields**:
  - **Employee Name**: Input field for the employee’s full name.
  - **Gross Income**: Input field for the employee's gross income.
  - **Pay Frequency**: Dropdown to select whether the employee is paid weekly, bi-weekly, or monthly.
  - **Pre-Tax Deductions**: Input field to account for any pre-tax deductions (e.g., retirement, healthcare).
  - **Filing Status**: Input to specify the employee's tax filing status (e.g., single, married).
  - **Dependents**: Number of dependents for tax calculation.
  - **Overtime Hours**: If applicable, overtime hours can be entered for calculation.

#### 2. **Backend Logic (`functions.php`)**:
The `functions.php` file contains all the core logic needed to calculate taxes and net pay:
- **`calculateFederalTax()`**: Calculates the federal tax based on the gross income and filing status.
- **`calculateStateTax()`**: Computes New York state tax based on the gross income.
- **`calculateSocialSecurityTax()`**: Calculates social security tax (6.2% of gross income).
- **`calculateMedicareTax()`**: Computes Medicare tax (1.45% of gross income).
- **`calculateNetPay()`**: Uses all other functions to compute the final net pay after deductions and taxes.

#### 3. **PDF Generation (`generate_paystub.php`)**:
- Collects data from the `POST` request and processes the pay stub generation using **TCPDF**.
- Generates a well-structured pay stub PDF with detailed sections like Employee Information, Earnings, Taxes, and Net Pay.
- Includes a footer with "Created by Sany" and the timestamp of PDF creation.

#### 4. **Styling and Theming**:
- **Light and Dark Mode** support using CSS variables (`--bg`, `--text`, `--input`, etc.).
- **CSS Styling** for the input form and PDF design, with colors, padding, and layout optimizations.
- On form submission, the user is redirected to `generate_paystub.php` to view and download the pay stub PDF.

---

### How to Use:

1. **Navigate to the Home Page**:
   - Go to `index.php` in your web browser.
   
2. **Fill in the Required Fields**:
   - Input your name, gross income, pay frequency, and other necessary data.
   
3. **Submit the Form**:
   - Once the form is completed, click the "Generate Pay Stub" button.
   
4. **Download Pay Stub**:
   - The page will redirect to `generate_paystub.php`, where a PDF will be generated automatically.
   - The PDF will display all the calculations and can be downloaded.

---

### Example Workflow:

1. **Input Data**:
   - Employee Name: John Doe
   - Gross Income: $2,000.00
   - Pay Frequency: Monthly
   - Pre-Tax Deductions: $110.00
   - Filing Status: Single
   - Dependents: 1
   - Overtime Hours: 5

2. **Calculation**:
   - The system calculates the taxes (federal, state, social security, and Medicare) and deductions.
   - It generates total earnings, total taxes, and computes the net pay.
   
3. **PDF Output**:
   - The generated PDF shows the pay stub with details like "Gross Income", "Pre-Tax Deductions", "Total Taxes", "Net Pay", and "Created by Sany".

---

### Conclusion:

This **NY Gross to Net Calculator** project allows for simple, quick, and accurate calculation of an employee's net pay, taking into account federal, state, and other applicable taxes. With the added PDF generation feature, employees can easily get a formatted pay stub with all their details. The system is built with flexibility, allowing for different pay frequencies, deduction types, and tax statuses.
