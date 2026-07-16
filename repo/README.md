# PHP Blogs — Simple Auth & Blog Starter

A lightweight PHP project featuring session-based authentication (signup/login/logout) and a basic blog homepage layout. Built as a learning/reference project for PHP fundamentals — page includes, sessions, and form handling.

> ⚠️ **Status:** Work in progress. The `includes/*.inc.php` handlers, `css/style.css`, and `js/main.js` referenced by the templates are not yet included in this repo — see [Missing Pieces](#missing-pieces) below.

## Features

- Session-based login state shown in the navbar (Login/Signup vs. My Profile/Logout)
- Signup form with client-facing validation error messages (empty fields, invalid username, invalid email, password mismatch, username taken)
- Login form with error messaging (empty fields, wrong credentials)
- Shared `header.php` / `footer.php` layout included across pages

## Project Structure

```
.
├── header.php          # Shared <head>, nav, and opening <main>
├── footer.php           # Closing </main>, scripts, </body></html>
├── index.php            # Homepage
├── login.php            # Login form + error handling
├── signup.php           # Signup form + error handling
├── css/
│   └── style.css        # (add your styles here)
├── js/
│   └── main.js           # (add your scripts here)
└── includes/
    ├── login.inc.php     # (login POST handler — not yet added)
    ├── signup.inc.php    # (signup POST handler — not yet added)
    └── logout.inc.php    # (session destroy handler — not yet added)
```

## Requirements

- PHP 7.4+ (uses standard `session_start()` / superglobals)
- A local server: PHP built-in server, XAMPP, or Docker

## Getting Started

```bash
git clone https://github.com/<your-username>/<repo-name>.git
cd <repo-name>
php -S localhost:8000
```

Then open `http://localhost:8000` in your browser.

## Missing Pieces

The templates reference the following files, which still need to be implemented:

- `includes/login.inc.php` — validates and authenticates against the database
- `includes/signup.inc.php` — validates input and creates a new user
- `includes/logout.inc.php` — destroys the session
- `css/style.css` / `js/main.js` — styling and front-end behavior

## Security Notes

This is a learning project. Before treating it as production-ready, make sure the (not-yet-written) `includes/*.inc.php` handlers:

- Use prepared statements (PDO/mysqli) for all database queries
- Hash passwords with `password_hash()` / verify with `password_verify()`
- Escape all user-controlled output with `htmlspecialchars()` before printing (e.g. the `$_SESSION['userUid']` greeting in `index.php`)
- Validate/sanitize all `$_GET`/`$_POST` input server-side, not just via URL error codes

## License

Licensed under the MIT License — see [LICENSE](LICENSE).
