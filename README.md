# 📚 Readscape

**Readscape** is a web-based e-library system designed for SMK IDN Boarding School Akhwat. It allows students and teachers to explore books, borrow and return them online, while giving admins full control over the library's data.

---

## ✨ Features

### 👩‍🎓 Student Dashboard
- 🔍 View all available books
- 📚 Browse books by category
- 📖 Borrow books
- ↩️ Return borrowed books

### 🧑‍💻 Admin Dashboard
- 📁 Manage book categories (add/edit/delete)
- 📕 Manage books (view/edit/delete)
- ➕ Add new books to the library
- 👥 View active borrowers and returned books
- 📊 See all borrowing activity

---

## 🔧 Tech Stack

- **Laravel** – PHP framework for backend
- **Bootstrap** – CSS framework for frontend
- **Vanilla CSS** – Additional custom styles

---

## 🚀 Getting Started

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/readscape.git
   cd readscape

2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run dev

3. **Configure the environment**
   ```bash
   cp .env.example .env
   php artisan key:generate

4. **Set up the database**
   ```bash
   php artisan migrate --seed

5
