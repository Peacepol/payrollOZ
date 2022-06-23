-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 07:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payrolloz_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `accums`
--

CREATE TABLE `accums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accum_code` varchar(255) NOT NULL,
  `accum_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accums`
--

INSERT INTO `accums` (`id`, `accum_code`, `accum_name`, `created_at`, `updated_at`) VALUES
(1, 'NO', 'Normal Pay / Ordinary Pay', NULL, NULL),
(2, 'O1', 'Overtime 1', NULL, NULL),
(3, 'O2', 'Overtime 2', NULL, NULL),
(4, 'S1', 'Special Rate 1', NULL, NULL),
(5, 'S1', 'Special Rate 2', NULL, NULL),
(6, 'TA', 'Taxable Benefits & Allowance', NULL, NULL),
(7, 'NA', 'Non Taxable Benefits & Allowance', NULL, NULL),
(8, 'SE', 'Superannuation Employee', NULL, NULL),
(9, 'SR', 'Superannuation Employer', NULL, NULL),
(10, 'MV', 'Motor Vehicle Notional Allowances', NULL, NULL),
(11, 'AC', 'Accommodation Notional Allowances', NULL, NULL),
(12, 'NCSL', 'NCSL Contributions', NULL, NULL),
(13, 'LS', 'Lump Sum Payments', NULL, NULL),
(14, 'SAV', 'Savings', NULL, NULL),
(15, 'MISC', 'Miscellaneous Deductions', NULL, NULL),
(16, 'TAXADJ', 'Tax Adjustments', NULL, NULL),
(17, 'ATI', 'Taxable Income Adjustments', NULL, NULL),
(18, 'MEALS', 'Meals Notional Allowances', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_address` text DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `branch_name`, `branch_address`, `company_id`, `created_at`, `updated_at`) VALUES
(10, 'branch1', '22', '1234223', 2, '2022-05-27 19:35:06', '2022-05-27 19:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_trading` varchar(255) DEFAULT NULL,
  `comp_add1` text DEFAULT NULL,
  `comp_add2` text DEFAULT NULL,
  `comp_city` varchar(255) DEFAULT NULL,
  `comp_state` varchar(255) DEFAULT NULL,
  `comp_postcode` varchar(255) DEFAULT NULL,
  `comp_country` varchar(255) DEFAULT NULL,
  `comp_madd1` text DEFAULT NULL,
  `comp_madd2` text DEFAULT NULL,
  `comp_mcity` varchar(255) DEFAULT NULL,
  `comp_mstate` varchar(255) DEFAULT NULL,
  `comp_mpostcode` varchar(255) DEFAULT NULL,
  `comp_mcountry` varchar(255) DEFAULT NULL,
  `comp_phone1` varchar(255) DEFAULT NULL,
  `comp_phone2` varchar(255) DEFAULT NULL,
  `comp_fax1` varchar(255) DEFAULT NULL,
  `comp_fax2` varchar(255) DEFAULT NULL,
  `comp_email` varchar(255) DEFAULT NULL,
  `comp_contact` varchar(255) DEFAULT NULL,
  `comp_taxno` varchar(255) DEFAULT NULL,
  `comp_businessno` varchar(255) DEFAULT NULL,
  `comp_superfund` varchar(255) DEFAULT NULL,
  `comp_superfundno` varchar(255) DEFAULT NULL,
  `comp_ncslno` varchar(255) DEFAULT NULL,
  `comp_initpy` bigint(20) DEFAULT NULL,
  `comp_setupflag` tinyint(4) NOT NULL DEFAULT 0,
  `comp_curpy` bigint(20) DEFAULT NULL,
  `comp_empmax` bigint(20) DEFAULT NULL,
  `comp_isactive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `comp_name`, `comp_trading`, `comp_add1`, `comp_add2`, `comp_city`, `comp_state`, `comp_postcode`, `comp_country`, `comp_madd1`, `comp_madd2`, `comp_mcity`, `comp_mstate`, `comp_mpostcode`, `comp_mcountry`, `comp_phone1`, `comp_phone2`, `comp_fax1`, `comp_fax2`, `comp_email`, `comp_contact`, `comp_taxno`, `comp_businessno`, `comp_superfund`, `comp_superfundno`, `comp_ncslno`, `comp_initpy`, `comp_setupflag`, `comp_curpy`, `comp_empmax`, `comp_isactive`, `created_at`, `updated_at`) VALUES
(1, '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', '123', '123', '123', NULL, 'pol2', '123', '123', NULL, NULL, NULL, 1234, 0, 1234, 21, 0, '2022-05-24 21:07:42', '2022-06-01 22:16:14'),
(2, 'asda', 'asda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123123', '123123', NULL, NULL, '123@gmail.com', 'pol', '651312', '12312', NULL, NULL, NULL, 2022, 0, 2022, 21, 0, '2022-05-26 00:05:23', '2022-05-26 00:05:23'),
(3, 'oppo', 'oppo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pol@asda.com', 'pol', '7612312', '612312', NULL, NULL, NULL, 2022, 0, 2022, 21, 0, '2022-05-27 23:46:37', '2022-05-27 23:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `costcentre`
--

CREATE TABLE `costcentre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cost_code` varchar(255) NOT NULL,
  `cost_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `costcentre`
--

INSERT INTO `costcentre` (`id`, `cost_code`, `cost_name`, `created_at`, `updated_at`) VALUES
(1, '123', '123', '2022-06-01 22:50:36', '2022-06-01 22:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `custom_reference1s`
--

CREATE TABLE `custom_reference1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref1_code` varchar(255) NOT NULL,
  `ref1_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_reference1s`
--

INSERT INTO `custom_reference1s` (`id`, `ref1_code`, `ref1_name`, `created_at`, `updated_at`) VALUES
(1, 'ref1', 'reference12', '2022-05-29 17:25:34', '2022-05-29 17:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `custom_reference2s`
--

CREATE TABLE `custom_reference2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref2_code` varchar(250) NOT NULL,
  `ref2_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_reference2s`
--

INSERT INTO `custom_reference2s` (`id`, `created_at`, `updated_at`, `ref2_code`, `ref2_name`) VALUES
(1, '2022-05-29 18:14:23', '2022-05-29 18:14:23', 'ref2', 'reference 2');

-- --------------------------------------------------------

--
-- Table structure for table `custom_reference3s`
--

CREATE TABLE `custom_reference3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref3_code` varchar(250) NOT NULL,
  `ref3_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_reference3s`
--

INSERT INTO `custom_reference3s` (`id`, `created_at`, `updated_at`, `ref3_code`, `ref3_name`) VALUES
(1, '2022-05-29 18:42:36', '2022-05-29 18:51:29', 'ref3', 'reference3');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dep_code` varchar(255) NOT NULL,
  `dep_name` varchar(255) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dep_code`, `dep_name`, `company_id`, `created_at`, `updated_at`) VALUES
(2, '33', '123', 1, '2022-05-27 19:19:33', '2022-05-28 00:13:24'),
(8, 'sr12ss', 'session road', 1, '2022-05-28 00:41:03', '2022-05-28 00:44:23'),
(9, '123', 'dept store', 3, '2022-06-02 22:24:29', '2022-06-02 22:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `emp_alphacode` varchar(255) NOT NULL,
  `emp_isactive` varchar(255) NOT NULL DEFAULT '0',
  `emp_fname` varchar(255) NOT NULL,
  `emp_mname` varchar(255) NOT NULL,
  `emp_lname` varchar(255) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_add1` varchar(255) DEFAULT NULL,
  `emp_add2` varchar(255) DEFAULT NULL,
  `emp_city` varchar(255) DEFAULT NULL,
  `emp_state` varchar(255) DEFAULT NULL,
  `emp_postcode` varchar(255) DEFAULT NULL,
  `emp_country` varchar(255) DEFAULT NULL,
  `emp_padd1` varchar(255) DEFAULT NULL,
  `emp_padd2` varchar(255) DEFAULT NULL,
  `emp_pcity` varchar(255) DEFAULT NULL,
  `emp_pstate` varchar(255) DEFAULT NULL,
  `emp_ppostcode` varchar(255) DEFAULT NULL,
  `emp_pcountry` varchar(255) DEFAULT NULL,
  `emp_phone` varchar(100) DEFAULT NULL,
  `emp_mobile` varchar(100) DEFAULT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_doe` date NOT NULL,
  `emp_branchid` int(11) DEFAULT NULL,
  `emp_depid` int(11) DEFAULT NULL,
  `emp_cref1id` int(11) DEFAULT NULL,
  `emp_cref2id` int(11) DEFAULT NULL,
  `emp_cref3id` int(11) DEFAULT NULL,
  `emp_cfield1` varchar(255) DEFAULT NULL,
  `emp_cfield2` varchar(255) DEFAULT NULL,
  `emp_cfield3` varchar(255) DEFAULT NULL,
  `emp_estatus` varchar(50) DEFAULT NULL,
  `emp_position` varchar(50) DEFAULT NULL,
  `emp_gender` varchar(50) NOT NULL,
  `emp_mstatus` varchar(50) NOT NULL,
  `emp_dot` date NOT NULL,
  `emp_passportno` varchar(100) DEFAULT NULL,
  `emp_passportexpiry` date DEFAULT NULL,
  `emp_visa` varchar(100) DEFAULT NULL,
  `emp_visaexpiredate` date DEFAULT NULL,
  `emp_nationality` varchar(255) NOT NULL,
  `emp_religion` varchar(255) NOT NULL,
  `emp_comments` varchar(255) DEFAULT NULL,
  `emp_isapproved` tinyint(4) NOT NULL DEFAULT 0,
  `emp_accesslevel` tinyint(4) NOT NULL DEFAULT 0,
  `emp_img` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_code`, `emp_alphacode`, `emp_isactive`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_dob`, `emp_add1`, `emp_add2`, `emp_city`, `emp_state`, `emp_postcode`, `emp_country`, `emp_padd1`, `emp_padd2`, `emp_pcity`, `emp_pstate`, `emp_ppostcode`, `emp_pcountry`, `emp_phone`, `emp_mobile`, `emp_email`, `emp_doe`, `emp_branchid`, `emp_depid`, `emp_cref1id`, `emp_cref2id`, `emp_cref3id`, `emp_cfield1`, `emp_cfield2`, `emp_cfield3`, `emp_estatus`, `emp_position`, `emp_gender`, `emp_mstatus`, `emp_dot`, `emp_passportno`, `emp_passportexpiry`, `emp_visa`, `emp_visaexpiredate`, `emp_nationality`, `emp_religion`, `emp_comments`, `emp_isapproved`, `emp_accesslevel`, `emp_img`, `created_at`, `updated_at`, `company_id`) VALUES
(1, '103', '103', '0', 'Silas', 'L', 'Polome', '2022-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paymaster@ablepayrollpng.com', '2022-06-02', 10, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'Permanent', 'Male', 'Male', 'Single', '2022-06-01', NULL, NULL, NULL, NULL, 'Filipino', 'Christian', NULL, 0, 0, NULL, '2022-05-31 19:16:01', '2022-05-31 19:16:01', 1),
(2, '', '101', '0', 'Martha', 'P', 'Ovio', '2022-06-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sanjeeb.dash@pacificfoam.com.pg', '2022-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Permanent', 'Male', 'Male', 'Single', '2022-06-01', NULL, NULL, NULL, NULL, 'Filipino', 'Christian', NULL, 0, 0, NULL, '2022-05-31 19:18:36', '2022-05-31 19:18:36', 3),
(4, '101', '101', '0', 'pol', 'baluyot', 'nuguid', '1995-05-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'polnuguid.28@gmail.com', '2022-06-01', 10, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'Permanent', 'Male', 'Male', 'Single', '2022-06-09', NULL, NULL, NULL, NULL, 'Filipino', 'Christian', NULL, 0, 0, NULL, '2022-05-31 19:56:28', '2022-05-31 19:56:28', 3),
(12, '102', '102', '0', '123', '123', '123', '2000-03-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sanjeeb.dash@pacificfoam.com.pg', '2022-06-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Permanent', 'Male', 'Male', 'Single', '2022-07-09', NULL, NULL, NULL, NULL, 'Filipino', 'christian', NULL, 0, 0, NULL, '2022-06-02 23:54:17', '2022-06-02 23:54:17', 0),
(13, '105', '105', '0', 'Silas', 'L', 'Marlona', '1995-02-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sep.kusan@gmail.com', '2022-06-04', 10, 9, NULL, NULL, NULL, NULL, NULL, NULL, 'Permanent', 'Male', 'Male', 'Single', '2022-06-17', NULL, NULL, NULL, NULL, 'Pinoy', 'Muslim', NULL, 0, 0, NULL, '2022-06-03 19:05:08', '2022-06-03 19:05:08', 3),
(14, '111', '111', '0', 'Silas', 'L', 'Marlona', '1995-02-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sep.kusan@gmail.com', '2022-06-04', 10, 9, NULL, NULL, NULL, NULL, NULL, NULL, 'Permanent', 'Male', 'Male', 'Single', '2022-06-17', NULL, NULL, NULL, NULL, 'Pinoy', 'Muslim', NULL, 0, 0, NULL, '2022-06-03 19:06:44', '2022-06-03 19:06:44', 2),
(15, '22', '22', '0', 'Boga', '123', 'Ovio', '2022-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paymaster@ablepayrollpng.com', '2022-06-18', 10, 9, NULL, NULL, NULL, NULL, NULL, NULL, 'Permanent', 'Male', 'Female', 'Single', '2022-06-10', NULL, NULL, NULL, NULL, 'PNG', 'christian', NULL, 0, 0, NULL, '2022-06-03 19:10:11', '2022-06-03 19:10:11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee_p_files`
--

CREATE TABLE `employee_p_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_costid` int(11) DEFAULT NULL,
  `emp_paynoid` int(11) DEFAULT NULL,
  `emp_paylocid` int(11) DEFAULT NULL,
  `emp_defid` int(11) DEFAULT NULL,
  `emp_rateyear` double DEFAULT NULL,
  `emp_rateunit` double DEFAULT NULL,
  `emp_paymode` varchar(255) DEFAULT NULL,
  `emp_taxid` varchar(255) DEFAULT NULL,
  `emp_res` int(11) DEFAULT NULL,
  `emp_taxformlodged` int(11) DEFAULT NULL,
  `emp_dependents` int(11) DEFAULT NULL,
  `emp_supervisor` int(11) DEFAULT NULL,
  `emp_contractsalary` double DEFAULT NULL,
  `emp_contractsalaryPGK` double DEFAULT NULL,
  `emp_initER` double DEFAULT NULL,
  `emp_currency` int(11) DEFAULT NULL,
  `emp_lastpaydate` date DEFAULT NULL,
  `emp_flag` varchar(255) DEFAULT NULL,
  `emp_dot` date DEFAULT NULL,
  `emp_dor` date DEFAULT NULL,
  `emp_ncsl` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_p_files`
--

INSERT INTO `employee_p_files` (`id`, `emp_id`, `emp_costid`, `emp_paynoid`, `emp_paylocid`, `emp_defid`, `emp_rateyear`, `emp_rateunit`, `emp_paymode`, `emp_taxid`, `emp_res`, `emp_taxformlodged`, `emp_dependents`, `emp_supervisor`, `emp_contractsalary`, `emp_contractsalaryPGK`, `emp_initER`, `emp_currency`, `emp_lastpaydate`, `emp_flag`, `emp_dot`, `emp_dor`, `emp_ncsl`, `created_at`, `updated_at`) VALUES
(1, 15, NULL, NULL, NULL, NULL, 123, 12, 'C', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-03 19:10:11', '2022-06-03 19:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_05_14_074938_create_company_table', 1),
(7, '2022_05_16_060123_create_branches_table', 1),
(8, '2022_05_17_003102_create_cost_centre_table', 1),
(9, '2022_05_17_065155_create_departments_table', 1),
(10, '2022_05_28_073542_create_custom_reference1s_table', 2),
(11, '2022_05_28_073612_create_custom_reference2s_table', 2),
(12, '2022_05_28_073624_create_custom_reference3s_table', 2),
(13, '2022_05_30_032440_create_pay_items_table', 3),
(14, '2022_05_30_042954_create_accums_table', 3),
(15, '2022_05_30_060331_create_payaccumulator_table', 4),
(16, '2022_05_30_060924_create_paylocation_table', 4),
(17, '2022_05_30_061127_create_paybatchnumber_table', 4),
(18, '2022_05_30_065818_create_superfunds_table', 5),
(19, '2022_05_31_015337_create_employees_table', 6),
(20, '2022_06_04_005712_create_employee_p_files_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payaccumulator`
--

CREATE TABLE `payaccumulator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payaccumulator_code` varchar(255) NOT NULL,
  `payaccumulator_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payaccumulator`
--

INSERT INTO `payaccumulator` (`id`, `payaccumulator_code`, `payaccumulator_name`, `created_at`, `updated_at`) VALUES
(1, 'NO', 'Normal Pay / Ordinary Pay', NULL, NULL),
(2, 'O1', 'Overtime 1', NULL, NULL),
(3, 'O2', 'Overtime 2', NULL, NULL),
(4, 'S1', 'Special Rate 1', NULL, NULL),
(5, 'S1', 'Special Rate 2', NULL, NULL),
(6, 'TA', 'Taxable Benefits & Allowance', NULL, NULL),
(7, 'NA', 'Non Taxable Benefits & Allowance', NULL, NULL),
(8, 'SE', 'Superannuation Employee', NULL, NULL),
(9, 'SR', 'Superannuation Employer', NULL, NULL),
(10, 'MV', 'Motor Vehicle Notional Allowances', NULL, NULL),
(11, 'AC', 'Accommodation Notional Allowances', NULL, NULL),
(12, 'NCSL', 'NCSL Contributions', NULL, NULL),
(13, 'LS', 'Lump Sum Payments', NULL, NULL),
(14, 'SAV', 'Savings', NULL, NULL),
(15, 'MISC', 'Miscellaneous Deductions', NULL, NULL),
(16, 'TAXADJ', 'Tax Adjustments', NULL, NULL),
(17, 'ATI', 'Taxable Income Adjustments', NULL, NULL),
(18, 'MEALS', 'Meals Notional Allowances', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paybatchnumber`
--

CREATE TABLE `paybatchnumber` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paybatch_code` varchar(255) NOT NULL,
  `paybatch_name` varchar(255) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paylocation`
--

CREATE TABLE `paylocation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paylocation_code` varchar(255) NOT NULL,
  `paylocation_name` varchar(255) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pay_items`
--

CREATE TABLE `pay_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `accum_id` int(11) NOT NULL,
  `pay_mode` varchar(1) NOT NULL,
  `pay_fixamt` double(11,2) NOT NULL DEFAULT 0.00,
  `pay_percent` double(11,2) NOT NULL DEFAULT 0.00,
  `tax_flag` varchar(3) NOT NULL,
  `tax_rate` double(11,2) NOT NULL DEFAULT 0.00,
  `super_id` int(11) NOT NULL,
  `tax_spread` varchar(1) NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT 0,
  `gl_id` int(11) NOT NULL DEFAULT 0,
  `bc_number` int(11) NOT NULL,
  `bd_number` int(11) NOT NULL,
  `isleaveaccrual` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `superfunds`
--

CREATE TABLE `superfunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `registered_name` varchar(255) NOT NULL,
  `physical_address_line_1` varchar(255) NOT NULL,
  `physical_address_line_2` varchar(255) NOT NULL,
  `physical_suburb` varchar(255) NOT NULL,
  `physical_state` varchar(255) NOT NULL,
  `physical_post_code` varchar(255) NOT NULL,
  `postal_address_line_1` varchar(255) NOT NULL,
  `postal_address_line_2` varchar(255) NOT NULL,
  `postal_suburb` varchar(255) NOT NULL,
  `postal_state` varchar(255) NOT NULL,
  `postal_post_code` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `abn` varchar(255) NOT NULL,
  `bsb_account_number` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `client_code` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `max_employee` varchar(255) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `client_code`, `phone_number`, `company_name`, `max_employee`, `country`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pol', 'b', 'nuguid', '1234', '09454858984', 'sample', NULL, NULL, 'polnuguid.28@gmail.com', NULL, '$2y$10$v/XnqXixOUY1rfX8QldJFuaSL7Zk79QSPsbWWeRhAGD7O.m7XNv2i', NULL, NULL, NULL, '2022-05-24 20:02:33', '2022-05-24 20:02:33'),
(3, 'hello', 'pol', 'nuguid', NULL, '019283', '123', NULL, NULL, 'email@email.com', NULL, '$2y$10$nqxyrLSDT1IwFE6ky2MYkOFMzU8WWdA03BxYhDkWLg4wUhBpPzNQq', NULL, NULL, NULL, '2022-06-01 18:02:43', '2022-06-01 18:02:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accums`
--
ALTER TABLE `accums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_company_id_foreign` (`company_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costcentre`
--
ALTER TABLE `costcentre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_reference1s`
--
ALTER TABLE `custom_reference1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_reference2s`
--
ALTER TABLE `custom_reference2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_reference3s`
--
ALTER TABLE `custom_reference3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_company_id_foreign` (`company_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_emp_code_unique` (`emp_code`);

--
-- Indexes for table `employee_p_files`
--
ALTER TABLE `employee_p_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payaccumulator`
--
ALTER TABLE `payaccumulator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paybatchnumber`
--
ALTER TABLE `paybatchnumber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paybatchnumber_company_id_foreign` (`company_id`);

--
-- Indexes for table `paylocation`
--
ALTER TABLE `paylocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paylocation_company_id_foreign` (`company_id`);

--
-- Indexes for table `pay_items`
--
ALTER TABLE `pay_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `superfunds`
--
ALTER TABLE `superfunds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accums`
--
ALTER TABLE `accums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `costcentre`
--
ALTER TABLE `costcentre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_reference1s`
--
ALTER TABLE `custom_reference1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_reference2s`
--
ALTER TABLE `custom_reference2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_reference3s`
--
ALTER TABLE `custom_reference3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee_p_files`
--
ALTER TABLE `employee_p_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payaccumulator`
--
ALTER TABLE `payaccumulator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `paybatchnumber`
--
ALTER TABLE `paybatchnumber`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paylocation`
--
ALTER TABLE `paylocation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_items`
--
ALTER TABLE `pay_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superfunds`
--
ALTER TABLE `superfunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `paybatchnumber`
--
ALTER TABLE `paybatchnumber`
  ADD CONSTRAINT `paybatchnumber_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `paylocation`
--
ALTER TABLE `paylocation`
  ADD CONSTRAINT `paylocation_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
