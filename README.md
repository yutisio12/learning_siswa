# 📘 Learning Siswa

**Learning Siswa** is a web-based e-learning platform where **students** can read learning materials and take exams, while **teachers** can add materials and create various exam questions.  
Built using **CodeIgniter 3**, **Bootstrap 4**, and **SB Admin 2** template.

---

## ✨ Features

- 🔑 **Authentication**
  - Login / Register
- 👩‍🎓 **Student Management**
  - CRUD student data
- 👨‍🏫 **Teacher Management**
  - CRUD teacher data
- 👤 **User Management**
  - User access & role management
- 📚 **Subjects**
  - CRUD subjects
- 📝 **Exams & Quiz**
  - Question bank
  - Learning modules
  - Student exam results
- 📊 **Dashboard**
  - Statistics of students, teachers, and exams
- 🔍 **Utilities**
  - Pagination & Search
  - Export Excel / Reporting

---

## 🛠️ Tech Stack

- **Backend**: [CodeIgniter 3](https://codeigniter.com/userguide3/)  
- **Frontend**: [Bootstrap 4](https://getbootstrap.com/docs/4.0/) + [SB Admin 2](https://startbootstrap.com/theme/sb-admin-2)  
- **Database**: MySQL / MariaDB  
- **Server**: XAMPP (PHP 7, Apache, MySQL)  

---

## 🚀 Installation

1. **Clone Repository**
   ```bash
   git clone https://github.com/yutisio12/learning_siswa.git
   cd learning_siswa
   ```

2. **Setup Database**
   - Create a database in MySQL (e.g., `learning_siswa`)
   - Import the SQL file provided (`database/learning_siswa.sql` if available)

3. **Configure Environment**
   - Open `application/config/config.php` and `application/config/database.php`
   - Adjust the following:
     ```php
     $config['base_url'] = 'http://localhost/learning_siswa/';
     ```

     ```php
     'hostname' => 'localhost',
     'username' => 'root',
     'password' => '',
     'database' => 'learning_siswa',
     ```

4. **Run Project**
   - Start Apache & MySQL via XAMPP
   - Open in browser:
     ```
     http://localhost/learning_siswa/
     ```

---

## 📂 Project Structure

```
learning_siswa/
├── application/       # CodeIgniter app (controllers, models, views)
├── assets/            # CSS, JS, Bootstrap, SB Admin 2
├── system/            # CodeIgniter core
├── database/          # (Optional) SQL files
└── index.php          # Entry point
```

---

## 🎨 UI Template

This project uses **SB Admin 2** for a modern and responsive dashboard interface.  

---

## 📜 License

MIT © 2021 [Yutisio12](https://github.com/yutisio12)
