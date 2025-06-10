<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --danger-color: #dc2626;
            --danger-hover: #b91c1c;
            --success-color: #16a34a;
            --text-color: #334155;
            --border-radius: 8px;
            --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%);
            color: var(--text-color);
            line-height: 1.6;
        }

        header {
            background: linear-gradient(to right, var(--dark-color), var(--primary-color));
            color: white;
            padding: 20px 30px;
            text-align: center;
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
        }

        header h1 {
            font-weight: 700;
            font-size: 2.2rem;
            letter-spacing: 1px;
            margin: 0;
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            z-index: 1;
        }

        nav {
            background: var(--dark-color);
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        nav a {
            color: var(--light-color);
            margin: 0 15px;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            position: relative;
            padding: 8px 0;
            transition: var(--transition);
        }

        nav a:hover {
            color: var(--accent-color);
            text-decoration: none;
        }

        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--accent-color);
            transition: var(--transition);
        }

        nav a:hover::after {
            width: 100%;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 60%;
            max-width: 800px;
            margin: 30px auto;
            border-top: 4px solid var(--primary-color);
            transition: var(--transition);
        }

        form:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: var(--dark-color);
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0;
            border: 1px solid #e2e8f0;
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: var(--transition);
            background-color: #f8fafc;
            color: var(--text-color);
            font-family: 'Poppins', Arial, sans-serif;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        input[type="submit"] {
            background: var(--danger-color);
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: var(--border-radius);
            font-weight: 500;
            display: inline-block;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input[type="submit"]:hover {
            background: var(--danger-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"]:active {
            transform: translateY(0);
        }

        p {
            margin-bottom: 20px;
            text-align: center;
            color: var(--text-color);
        }

        @media (max-width: 768px) {
            form {
                width: 90%;
                padding: 20px;
            }
            
            header h1 {
                font-size: 1.8rem;
            }
            
            nav a {
                margin: 0 8px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Selamat Datang di Panel Admin</h1>
    </header>